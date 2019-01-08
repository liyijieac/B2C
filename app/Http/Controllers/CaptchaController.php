<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Gregwar\Captcha\CaptchaBuilder;

class CaptchaController extends Controller
{
    public function make(CaptchaBuilder $captcha) {

        
        $captcha->build();

        session([

            'captcha'=>$captcha->getPhrase(),

        ]);

        return response($captcha->output())
                ->header('Content-Type','image/jpeg');

    }
}
