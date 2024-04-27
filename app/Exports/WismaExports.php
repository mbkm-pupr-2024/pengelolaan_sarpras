<?php

namespace App\Exports;

use App\Models\Wisma;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class WismaExports implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Wisma::select('name', 'room', 'from', 'start','end', 'isOut')->get();
    }

    public function headings(): array
    {
        return [
            'Nama',
            'Kamar',
            'Asal',
            'Tanggal mulai',
            'Tanggal selesai',
            'Status'
        ];
    }

    public function map($wisma): array
    {
        return [
            $wisma->name,
            $wisma->room,
            $wisma->from,
            date("d-m-Y", strtotime($wisma->start)),
            date("d-m-Y", strtotime($wisma->end)),
            $wisma->isOut ? 'Selesai' : 'Ditempati'
        ];
    }
}
