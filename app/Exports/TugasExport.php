<?php

namespace App\Exports;

use App\Models\Tugas;
use Maatwebsite\Excel\Concerns\FromCollection;

class TugasExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Tugas::all();
    }
}
