<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    public function index()
    {
    
    $habitaciones = DB::table('habitaciones')->where('Estado', 'Disponible')->get();

    
    return view('Reservacion.reservacion', compact('habitaciones'));
    }

    public function registrar(Request $request){

        $numeroHabitacion = (int) $request->numero_habitacion;
        $fecha = $request->fecha;   
        $cedula = $request->cedula;
        $nombre = $request->nombre;
        $n_personas= $request->n_personas;
        $hor_ingreso = $request->hora;
        $tiempo = $request->tiempo;
        $valor = $request->valor;

        
        $visitante = DB::table('visitantes')->where('Cedula', $request->cedula)->first();

        if (!$visitante) {
            
            $visitante_id = DB::table('visitantes')->insertGetId([
                'Cedula' => $request->cedula,
                'Nombre' => $request->nombre,
            ]);
        } else {
            
            $visitante_id = $visitante->ID;
        }

        DB::table('habitaciones')
        ->where('N_habitacion', $numeroHabitacion)
        ->update(['Estado' => 'Ocupado']);


        DB::table('habitaciones_uso')->insert([
            'id_habitacion' => $request->numero_habitacion,
            'id_visitante' => $visitante_id,
            'N_personas' => $n_personas,
            'Tiempo' => $tiempo,
            'Valor' => $valor,
            'Fecha' => $fecha,
            'hor_ingreso' => $hor_ingreso
        ]);
    
        return redirect()->back()->with('success', 'Habitación registrada exitosamente.');
    }

    
    //SECCION CERRAR SERVICIO 
    public function index_close($id){


        return view('Habitaciones.cerrarHabitacion' , compact('id'));
    }

    public function dataUpdate(Request $request,$id_Parm){

        $id = $id_Parm;
        $hora_salida = $request->hora_salida;
        $observacion = $request->observaciones;
        $estado = 'Disponible';

        $habitacion = DB::table('habitaciones')
        ->join('habitaciones_uso' , 'habitaciones.N_habitacion' , '=', 'habitaciones_uso.id_habitacion')
        ->where('habitaciones_uso.ID', $id)
        ->update([
            'habitaciones.Estado' => 'Disponible',
            'habitaciones_uso.hor_salida' => $hora_salida,
            'habitaciones_uso.Observacion' => $observacion
        ]);

        return Redirect::route('dashboard')->with('success', 'Servicio finalizado');
    }
    
}
