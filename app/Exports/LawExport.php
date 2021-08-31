<?php

namespace App\Exports;

use App\Law;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;

class LawExport implements WithHeadings,WithMapping,FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    use Exportable;

    function __construct($year,$type,$offer) {
        $this->year = $year;
        $this->type = $type;
        $this->offer = $offer;
    }


    public function collection()
    {
        if($this->offer==null && $this->type==null){
            //dd("ว่างทั้งคู่");
            $law=DB::table('laws')
            ->join('types', 'types.t_id', '=', 'laws.type')
            ->join('stutas', 'stutas.id', '=', 'laws.stutas')
            ->where('date_announce', 'like', '%'.$this->year.'%')
            ->orderBy('laws.law_id', 'DESC')
            ->get();
            return $law;
        }elseif($this->type!=null && $this->offer==null ){
            //dd("ว่างเสนอ");
            $law=DB::table('laws')
            ->join('types', 'types.t_id', '=', 'laws.type')
            ->join('stutas', 'stutas.id', '=', 'laws.stutas')
            ->where('date_announce', 'like', '%'.$this->year.'%')
            ->where('type','=',$this->type)
            ->orderBy('laws.law_id', 'DESC')
            ->get();
            return $law;
        }elseif($this->offer!=null && $this->type==null){
            //dd("ว่างประเภท");
            $law=DB::table('laws')
            ->join('types', 'types.t_id', '=', 'laws.type')
            ->join('stutas', 'stutas.id', '=', 'laws.stutas')
            ->where('date_announce', 'like', '%'.$this->year.'%')
            ->where('offer','=',$this->offer)
            ->orderBy('laws.law_id', 'DESC')
            ->get();
            return $law;
        }else{
            //dd("ไม่ว่าง");
            $law=DB::table('laws')
            ->join('types', 'types.t_id', '=', 'laws.type')
            ->join('stutas', 'stutas.id', '=', 'laws.stutas')
            ->where('date_announce', 'like', '%'.$this->year.'%')
            ->where('type','=',$this->type)
            ->where('offer','=',$this->offer)
            ->orderBy('laws.law_id', 'DESC')
            ->get();
            return $law;
        }

    }

    public function map($law): array
    {
        return [
            $law->offer,
            $law->name_type,
            $law->law_name,
            thaidate(' j M Y', $law->date_announce),
            $law->t_name,
        ];

    }

    public function headings(): array
    {
        return [
            'เสนอ',
            'ประเภท',
            'เรื่อง',
            'วันที่เพยแพร',
            'สถานะ'
        ];
    }




}
