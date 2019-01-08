<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\Models\User;
use Storage;
use App\Http\Requests\FaceRequest;

class FaceController extends Controller
{
    public function face(FaceRequest $req) {

        if($req->has('face') && $req->face->isValid()) {

            $oldimage = $req->face->path();

            $date = date('Ymd');

            $orilmg = $req0->face->store('face/'.$date);

            $img = Image::make($oldimage);

            $img->crop((int)$req->w,(int)$req->h,(int)$req->x,(int)$req->y);

            $bgname = str_replace('face/'.$date.'/','face/'.$date.'/bg_',$orilmg);

            $img->resize(240,240);

            $img->save('./uploads/'.$bgname);

            $mdname = str_replace('face/'.$date.'/','face/'.$date.'/md_',$orilmg);

            $img->resize(80,80);

            $img->save('./uploads/'.$mdname);

            $smname = str_replace('face/'.$date.'/','face/'.$date.'/sm_',$orilmg);

            $img->resize(35,35);

            $img->save('./uploads.'.$smname);

            $user = User::find( session('id') );

            Storage::delete( $user->face );

            Storage::delete( $user->bgface );

            Storage::delete( $user->mdface );

            Storage::delete( $user->smface );

            $user->face = $orilmg;

            $user->bgface = $bgname;

            $user->mdface = $mdname;

            $user->smface = $smname;

            $user->save();

            session([

                'smface'=>$smname,
                'bgface'=>$bgname,

            ]);

        }

    }
}
