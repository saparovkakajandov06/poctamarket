<?php

namespace App\Exports;

use App\Order;
use Maatwebsite\Excel\Concerns\FromCollection;

class OrderExport implements FromCollection
{
    protected $orderId;

    public function __construct($orderId) {
        $this->orderId = $orderId;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Order::where('id',$this->orderId)->first();
    }
}
