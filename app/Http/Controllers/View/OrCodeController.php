<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use tests\thinkphp\library\think\viewTest;

class OrCodeController extends Controller
{
    public function toOrCode(){
        return view('or_code');
    }
}