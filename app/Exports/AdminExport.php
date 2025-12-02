<?php

namespace App\Exports;

use App\Models\Admins;
use Maatwebsite\Excel\Concerns\FromCollection;

class AdminExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Admins::all();
    }
         public function headings(): array
    {
        return ['ID', 'Role id','Name', 'Address','Email','Password','Status','Created at','Updated at'];
    }
}
