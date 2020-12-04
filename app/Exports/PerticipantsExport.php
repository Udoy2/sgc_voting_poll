<?php

namespace App\Exports;

use App\Perticipant;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;
class PerticipantsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    protected $poll_id;

    public function __construct($poll_id){
        $this->poll_id = $poll_id;
    }



    public function collection()
    {
        return Perticipant::select('code')->where('poll_id',$this->poll_id)->get();
    }

    public function headings(): array
    {
        return [

            'code'
        ];
    }
}
