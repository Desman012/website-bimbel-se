<?php

namespace App\Exports;

use App\Models\Reviews;
use Maatwebsite\Excel\Concerns\FromCollection;

class TestimoniExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Reviews::all();
    }
    //  public function headings(): array
    // {
    //     return ['ID', 'Role id','Name', 'Address','phone_number','student email','password','parent name',''];
    // }
}
