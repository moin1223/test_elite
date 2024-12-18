<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProductCode;
use Illuminate\Support\Str;

class ProductCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    $codes = [];
    $limit = 50;
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
}

private function isProductCodeExists($code)
{
    return ProductCode::where('product_code', $code)->exists();
}
    
}
