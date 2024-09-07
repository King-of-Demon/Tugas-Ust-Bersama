<?php

namespace App\Imports;

use App\Models\Tugas;
use Maatwebsite\Excel\Concerns\ToModel;

class TugasImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Tugas([
            'nama' => $row[1],
            'jeniskelamin' => $row[2],
            'no' => $row[3],
            'foto' => $row[4]
        ]);
    }
}
