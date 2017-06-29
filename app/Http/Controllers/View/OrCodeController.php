<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;

class OrCodeController extends Controller
{
    public function toOrCode(Request $request)
    {
        if(!file_exists(public_path('qrcodes'))) {
            mkdir(public_path('qrcodes'));
        }
        $code = QrCode::format('png')
            ->size(400)->merge('/public/bzl.png',.20)
            ->generate('http://www.zhuoyijinrong.com?name=byYIgBzue7JzD22RB5edAYN01Tp6rM0tbyYIgBzue7JzD22RB5edAYN01Tp6rM0tbyYIgBzue7JzD22RB5edAYN01Tp6rM0tbyYIgBzue7JzD22RB5edAYN01Tp6rM0t', public_path('qrcodes/bzls.png'));
        return view('or_code')-> with('code', $code);
    }

    public function toAddCode(Request $request)
    {
        return view('add_code');
    }
}