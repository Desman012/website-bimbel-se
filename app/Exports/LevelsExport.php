<?php

namespace App\Exports;

use App\Models\Levels;
use Maatwebsite\Excel\Concerns\FromCollection;

class LevelsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Levels::all();
    }
}
