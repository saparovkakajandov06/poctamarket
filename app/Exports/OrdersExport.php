<?php

namespace App\Exports;

use App\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrdersExport implements FromCollection, WithHeadings, ShouldAutoSize, WithEvents, WithColumnFormatting, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $orders = Order::all();
        foreach($orders as $or) {
            if(!$or->user_name && !$or->user_surname) {
                $or->user_name = $or->user;
                $or->user_surname = $or->user;
                $or->user_phone = $or->user;
            }
            
          
                $or->address = (isset(json_decode($or->address)->region) ? 'wel. ' . json_decode($or->address)->region : '') . 
                (isset(json_decode($or->address)->city) ? ', ş. ' . json_decode($or->address)->city : '') . 
                (isset(json_decode($or->address)->street) ? ', köçe ' . json_decode($or->address)->street : '') . 
                (isset(json_decode($or->address)->house) ? ', j. ' . json_decode($or->address)->house : '') . 
                
                (isset(json_decode($or->address)->apartment) ? ', öý. ' . json_decode($or->address)->apartment : '') . 
                (isset(json_decode($or->address)->korpus) ? ', korp. ' . json_decode($or->address)->korpus : '');
         
            switch ($or->status) {
                case 0:
                    $or->status = 'Täze';
                    break;
                case 1: 
                    $or->status = 'Işlenilýär';
                    break;
                case 2: 
                    $or->status = 'Ýapylan';
                    break;
                case 3: 
                    $or->status = 'Ýatyrylan';
                    break;
            }
         
          if($or->delivery == 0){
                $or->delivery_sum ?? 20;
          }
                                                    
                                              
            $or->delivery = ($or->delivery == 0 ? 'Kurýer' : 'Özüň alyp gaýtmak');

            switch ($or->paymenttype) {
                case 0: 
                    $or->paymenttype = 'Nagt töleg';break;
                case 1: 
                    $or->paymenttype = 'Onlaýn töleg';break;
                case 2: 
                    $or->paymenttype = 'Altyn Asyr kart töleg';break;
                case 3:
                    $or->paymenttype = 'Nagt däl töleg';break;
            }
        }
        // dd('ok');

        return $orders;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Ady, Familiýasy',
            'Telefony',
            'Salgysy',
            'Status',
            'Belgi',
            'Gowşurmak',
            'Jemi baha',
            'Eltip berme hyzmaty',
            'Töleg görnüşi',
            'Sene',
        ];
    }

    public function map($project): array
    {
        return [
            $project->id,
            $project->user_name . ' ' . $project->user_surname,
            '+993' . $project->user_phone,
            $project->address,
            $project->status,
            $project->comments,
            $project->delivery,
            number_format($project->total_price,2,'.',''),
            $project->delivery_sum,
            $project->paymenttype,
            Date::dateTimeToExcel($project->created_at)
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_NUMBER, 
            'B' => NumberFormat::FORMAT_TEXT,       
            'C' => NumberFormat::FORMAT_TEXT,       
            'D' => NumberFormat::FORMAT_TEXT,       
            'E' => NumberFormat::FORMAT_NUMBER,  
            'F' => NumberFormat::FORMAT_NUMBER,  
            'G' => NumberFormat::FORMAT_TEXT,  
            'H' => NumberFormat::FORMAT_NUMBER, 
            'I' => NumberFormat::FORMAT_NUMBER, 
            'J' => NumberFormat::FORMAT_TEXT,   
            'K' => NumberFormat::FORMAT_DATE_DDMMYYYY
        ];
    }


    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function(AfterSheet $event) {
                $cellRange = 'A1:I1'; // All headers
                $event->sheet->getDelegate()->getStyle($cellRange)->getFont()->setSize(14);
            },
        ];
    }
}
