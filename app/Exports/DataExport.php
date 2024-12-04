<?php

namespace App\Exports;

// use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DataExport implements FromView
{
    
    protected $habitaciones;

     public function __construct($habitaciones) {
        $this->habitaciones = $habitaciones;
    }
    
    public function view(): View
    {

        return view('Informacion.Excel.massivexls', [
            'habitaciones' => $this->habitaciones
        ]);
    }
}

