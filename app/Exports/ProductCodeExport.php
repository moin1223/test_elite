<?php

namespace App\Exports;

use App\Models\ProductCode;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;

class ProductCodeExport implements FromCollection
{
    use Exportable;

    protected $product_code_id;

    public function __construct($request)
    {
        $this->product_code_id = $request;
    }

    public function collection()
    {

       $productCodes = ProductCode::skip($this->product_code_id->start_id - 1)->take($this->product_code_id->end_id)->get();
        return $productCodes;
    }
}
