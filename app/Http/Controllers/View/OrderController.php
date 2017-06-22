<?php

namespace App\Http\Controllers\View;


use App\Entity\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entity\CartItem;
use App\Models\M3Result;

class OrderController extends Controller
{
  public function toOrderPay(Request $request)
  {
      return view('order_pay');
  }

}
