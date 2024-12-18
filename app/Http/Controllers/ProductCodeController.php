<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\ProductCode;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Excel;
use App\Exports\ProductCodeExport;


class ProductCodeController extends Controller
{
//Admin Part
public function index()
{
    $productCodes = ProductCode::paginate(10);
    return view('website.pages.product-code.index', compact('productCodes'));
}
public function create()
{
    
    return view('website.pages.product-code.create');
}

private function isProductCodeExists($code)
{
    return ProductCode::where('product_code', $code)->exists();
}
public function store(Request $request)
{
    $codes = [];
    $limit = $request->number;

    while (count($codes) < $limit) {
        $code = Str::random(8);
        if (!$this->isProductCodeExists($code) && !in_array($code, $codes)) {
            $codes[] = $code;
        }
    }

    foreach ($codes as $code) {
        ProductCode::create([
            'product_code' => $code,
            // Add other columns if needed
        ]);
    }


    return redirect()->route('product-code.index');
}



public function generatePdf()
{

    // $pdf = Pdf::loadView('test');
    return view('website.pages.product-code.generate-pdf');
}
public function downloadPdf(Request $request)
{
    // dd($request->all());
    // $productCodes = ProductCode::skip($request->start_id - 1)->take($request->end_id)->get();
    // $pdf = Pdf::loadView('website.pages.product-code.download-pdf',compact('productCodes'));
    // return $pdf->download('product_code.pdf');
    return Excel::download(new ProductCodeExport($request), 'product_code.xlsx');
}

}
