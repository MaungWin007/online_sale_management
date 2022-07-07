<?php

namespace App\Exports;

use App\Models\sale;
use App\Models\saleitem;
use Illuminate\contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class SaleExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View 
    {
        $data=[
            "header"=>"Sale Reports",
            "sale_record"=>sale::all(),
            "sale_detail"=>saleitem::all(),
        ];
        return view('excel',$data);
    }
}
