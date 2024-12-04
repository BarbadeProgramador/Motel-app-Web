<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class HomeController extends Controller
{
    public function Home()
    {
        // Obtener habitaciones desde la base de datos
        // $habitaciones = DB::table('habitaciones')->orderBy('Estado', 'asc')->get();

        // tengo que retornar todas las habitaciones 
        // tengo que capturar el ID de una posible reserva 


        $habitaciones = DB::table('habitaciones')
        ->leftJoin('habitaciones_uso', 'habitaciones_uso.id_habitacion', '=', 'habitaciones.N_habitacion')
        ->orderBy('Estado', 'asc')
        ->select('habitaciones.*', 'habitaciones_uso.ID') 
        ->get();
    
        return view('dashboard', compact('habitaciones'));    
        
    }
}
