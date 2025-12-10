<?php

namespace App\Imports;

use App\Models\Students;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;


class StudentImpor implements ToModel, WithHeadingRow
{
        use Importable;

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Students([
            //
             'name'  => $row['name'],
            'email' => $row['email'],
            'age'   => $row['age'],
        ]);
    }
}
