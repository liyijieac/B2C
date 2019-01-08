<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Hash;

class LoginController extends Controller
{
    public function logout() {

        session()->flush();

        return redirect()->route('index');

    }

    public function login() {

        return view('login.login');

    }

    public function dologin(LoginRequest $req) {

        $user = User::where('mobile',$req->mobile)->first();

        if($user){

            if( Hash::check( $req->password , $user->password ) ) {

                session([

                    'id'=>$user->id,
                    'mobile'=>$user->mobile,
                    // 'username'=>$user->username,
                    // 'face'=>$user->face,
                ]);

                return redirect()->route('index');

            }else {

                return back()->withErrors('Password error');

            }

        }else {

            return back()->withErrors('User name error');

        }

        $captcha = $req->session()->pull('captcha');

        if($req->captcha=='' || $captcha != $req->captcha) {

            return back()->withErrors(['captcha'=>'Verification code error']);

        }

    }
    
}
