<?php

namespace App\Exports;

use App\Models\Students;
use Maatwebsite\Excel\Concerns\FromCollection;

class StudentsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Students::all();
    }
    //  public function headings(): array
    // {
    //     return ['ID', 'Role id','Name', 'Address','phone_number','student email','password','parent name',''];
    // }
}
