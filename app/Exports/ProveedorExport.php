<?php

namespace ClinicaMedica\Exports;

use ClinicaMedica\Proveedor;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProveedorExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Proveedor::all();
    }
}
