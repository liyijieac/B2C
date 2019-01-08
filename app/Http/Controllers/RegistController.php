<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegistRequest;
use App\Models\User;
use Hash;   
use Storage;
use Flc\Dysms\Client;
use Flc\Dysms\Request\SendSms;
use Illuminate\Support\Facades\Cache;

class RegistController extends Controller
{
    public function regist() {

        return view('regist.regist');

    }

    public function sendmobilecode(Request $req) {

        $code = rand(100000,999999);

        $name = 'code-'.$req->mobile;

        Cache::put($name,$code,11);

        $config = [
            'accessKeyId'    => 'LTAIsPj8m15I7Qmj',
            'accessKeySecret' => 'dyOtJ8bYYIMZDSwDr48X1ZlpHXvTLO',
        ];
        
        $client  = new Client($config);
        $sendSms = new SendSms;
        $sendSms->setPhoneNumbers($req->mobile);
        $sendSms->setSignName('金蓓蕾幼儿园');
        $sendSms->setTemplateCode('SMS_135033504');
        $sendSms->setTemplateParam(['code' => $code]);
        // $sendSms->setOutId('demo');

        print_r($client->execute($sendSms));

    }

    public function doregist(Request $req) {
        
        $name = 'code-'.$req->mobile;

        $code = Cache::get($name);

        if(!$code || $code != $req->mobile_code) {

            return back()->withErrors(['mobile_code'=>'Validation code input error']);

        }

        $password = Hash::make($req->password);


        $user = new User;

        
        $user->mobile = $req->mobile;
        $user->username = $req->username;
        $user->password = $password;

        if($req->has('image') && $req->image->isValid()) {

            $image = $req->image->store(date('Ymd'));
            $user->image = $image;

        }else {

            return back()->withErrors([

                'image'=>'Upload failure',

            ]);

        }

        $user->save();

        return redirect()->route('login');

    }

}
