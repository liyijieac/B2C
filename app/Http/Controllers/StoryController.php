<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Memory;
use Flc\Dysms\Client;
use Flc\Dysms\Request\SendSms;

class StoryController extends Controller
{
    public function index() {

        return view('story.index');

    }

    public function dostory(Request $req) {

        $story = new Memory;

        $story->content = $req->content;

        if($req->has('image') && $req->image->isValid()) {

            $image = $req->image->store(date('Y-md'));
            $story->image = $image;

        }else {

            return back()->withErrors([

                'image'=>'Unable to upload',

            ]);

        }

        $story->save();

        return redirect()->route('list');

    }

    public function lista() {

        $memory = Memory::newlists();

        return view('story.list',[

            'memory'=>$memory,

        ]);

    }

}
