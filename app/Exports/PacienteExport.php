<?php

namespace ClinicaMedica\Exports;

use ClinicaMedica\Paciente;
use Maatwebsite\Excel\Concerns\FromCollection;

class PacienteExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Paciente::all();
    }
}
