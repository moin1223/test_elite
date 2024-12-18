<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Thana;
use Illuminate\Http\Request;

class CommonApiController extends Controller
{
    public function getDistricts()
    {
        $division_id = request('division_id');
        $districts = District::where('division_id', $division_id)->limit(15)
            ->get()
            ->map(fn ($item) => [
                'id' => $item->id,
                'text' => $item->name,
            ]);

        return response()->json($districts);
    }

    public function getThanas()
    {
        $district_id = request('district_id');
        $thanas = Thana::where('district_id', $district_id)
            ->get()
            ->map(fn ($item) => [
                'id' => $item->id,
                'text' => $item->name,
            ]);

        return response()->json($thanas);
    }
}
