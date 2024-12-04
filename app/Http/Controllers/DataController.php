<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DataExport;
// use Maatwebsite\Excel\Facades\Excel;

class DataController extends Controller
{
    public function index()
    {

        $habitaciones = DB::table('habitaciones_uso')
        ->join('habitaciones' , 'habitaciones.N_habitacion' , '=', 'habitaciones_uso.id_habitacion')
        ->join('visitantes' , 'visitantes.ID' , '=', 'habitaciones_uso.id_visitante')
        ->select(
            'habitaciones_uso.ID as id_habitacion_uso',
            'habitaciones_uso.*', 
            'habitaciones.*', 
            'visitantes.*'
        )    
        ->get();

        return view('Informacion.informacion' , compact('habitaciones'));
    }

    public function delete($id){

        $date_delete = DB::table('habitaciones_uso')->where('ID', $id)->delete();

        return redirect()->back()->with('success', 'Registro Eliminado con exito');
    }

    public function filtrar(Request $request){

        $fecha_inicio = $request->fecha_inicio2;
        $fecha_final = $request->fecha_final2;
        $N_habitacion = $request->n_habitaicon;
        $buttonFilter = $request->input('filterData');
    
        $habitaciones = DB::table('habitaciones_uso')
            ->join('habitaciones', 'habitaciones.N_habitacion', '=', 'habitaciones_uso.id_habitacion')
            ->join('visitantes', 'visitantes.ID', '=', 'habitaciones_uso.id_visitante')
            ->when($fecha_inicio && $fecha_final, function ($query) use ($fecha_inicio, $fecha_final) {
                return $query->whereBetween('Fecha', [$fecha_inicio, $fecha_final]);
            })
            ->when($N_habitacion, function ($query) use ($N_habitacion) {
                return $query->where('habitaciones.N_habitacion', 'LIKE', "%$N_habitacion%");
            })
            ->select(
                'habitaciones_uso.ID as id_habitacion_uso',
                'habitaciones_uso.*', 
                'habitaciones.*', 
                'visitantes.*'
            )
            ->paginate(100);

            if ($buttonFilter === 'FILTRAR') {
                return view('Informacion.informacion', compact('habitaciones'));
            } else if ($buttonFilter === 'EXCEL') {
                return Excel::download(new DataExport($habitaciones), 'historico.xlsx');
            }
        
    
    }


}
