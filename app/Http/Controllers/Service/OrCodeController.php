<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\Request;
use App\Entity\TempPhone;
use App\Entity\Code;
use App\Models\M3Result;

class OrCodeController extends Controller
{
    public function toCode(Request $request)
    {
        $phone = $request -> input('phone','');
        $nickname = $request -> input('nickname','');
        $sex = $request -> input('sex','');
        $phone_code = $request -> input('phone_code','');

        $m3_result = new M3Result;

        if( $phone == '') {
            $m3_result->status = 1;
            $m3_result->message = '手机号不能为空';
            return $m3_result->toJson();
        }
        if($nickname == '') {
            $m3_result->status = 2;
            $m3_result->message = '昵称不能为空';
            return $m3_result->toJson();
        }
        if($sex == '') {
            $m3_result->status = 3;
            $m3_result->message = '请选择性别';
            return $m3_result->toJson();
        }

        //手机号注册
        if($phone != '') {
            if($phone_code == '' || strlen($phone_code) != 6) {
                $m3_result->status = 5;
                $m3_result->message = '手机验证码为6位';
                return $m3_result->toJson();
            }

            $tempPhone = TempPhone::where('phone', $phone) -> first();
            if ($tempPhone -> code == $phone_code) {
                if (time() > strtotime($tempPhone -> deadline)) {
                    $m3_result->status = 7;
                    $m3_result->message = '手机验证码不正确';
                    return $m3_result->toJson();
                }

                $code = new Code;
                $code -> phone = $phone;
                $code -> nickname = $nickname;
                $code -> sex = $sex;
                $code -> save();

                $m3_result->status = 0;
                $m3_result->message = '添加成功';
                return $m3_result->toJson();

            }else {
                $m3_result->status = 6;
                $m3_result->message = '手机验证码不正确';
                return $m3_result->toJson();
            }
        }
    }
}