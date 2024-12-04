<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class HabitacionController extends Controller
{
    public function index()
    {
        return view('Habitaciones.registrar');
    }
    public function registrar(Request $request)
{

    $N_habitacion = $request->n_habitacion;
    $N_piso = $request->piso;
    $N_camas = $request->n_camas;
    $Jacuzzi = $request->jacuzzi;

    
    $existeHabitacion = DB::table('habitaciones')->where('N_habitacion', $N_habitacion)->exists();

    if ($existeHabitacion) {
        
        return redirect()->back()->with('error', 'El número de habitación ya está registrado.');
    }

    DB::table('habitaciones')->insert([
        'N_habitacion' => $N_habitacion,
        'Estado' => "Disponible",
        'N_camas' => $N_camas,
        'Piso' => $N_piso,
        'Jacuzzi' => $Jacuzzi,
    ]);

    return redirect()->back()->with('success', 'Habitación registrada exitosamente.');
    }

    public function indexAll(){
    $habitaciones = DB::table('habitaciones')->get();

    return view('Habitaciones.habitacionesAll', compact('habitaciones'));
    }

    public function delete($id){
            
            $habitacionExistente = DB::table('habitaciones_uso')->join('habitaciones', 'habitaciones_uso.id_habitacion', '=', 'habitaciones.N_habitacion' )
            ->where('id_habitacion' , $id)->count();
            
            if($habitacionExistente > 0){
                return redirect()->back()->with('error', 'Esta habitacion contiene reservas, no puede ser eliminada');
            }else{
                $deleted = DB::table('habitaciones')->where('N_habitacion', $id)->delete();
                return redirect()->back()->with('success', 'Habitación eliminada correctamente.');
            }
            
    }

}
