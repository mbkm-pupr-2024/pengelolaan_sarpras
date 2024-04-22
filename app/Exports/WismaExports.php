<?php

namespace App\Exports;

use App\Models\Wisma;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class WismaExports implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Wisma::select('name', 'room', 'from', 'end', 'isOut')->get();
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Kamar',
            'Asal',
            'Tanggal selesai',
            'Status'
        ];
    }
}
