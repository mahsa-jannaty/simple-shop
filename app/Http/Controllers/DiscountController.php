<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Discount;
class DiscountController extends Controller
{
    public function check(Request $request, $code)
    {
        $discount = Discount::where('code', $code)->first();
        return json_encode($discount);
    }
}
