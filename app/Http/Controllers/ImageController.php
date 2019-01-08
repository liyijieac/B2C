<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use Hash;
use App\Http\Requests\ImagetRequest;

class ImageController extends Controller
{
    public function camera() {

        $img = Image::select('image')
                        ->get();
        return view('image.camera',[

            'image'=>$img,

        ]); 

    }

    public function docamera(Request $req) {

        $img = new Image;
        
        if($req->has('image')&& $req->image->isValid()) {

            $image = $req->image->store(date('Ym-d'));

            $img->image = $image;

        }

        $img->save();
        
        return redirect()->route('camera');

    }
}
