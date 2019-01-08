<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index() {

        return view('game.index');

    }

    public function demo() {

        return view('game.demo');

    }

    public function demo1() {

        return view('game.demo1');

    }

    public function demo2() {

        return view('game.demo2');

    }

    public function demo3() {

        return view('game.demo3');

    }

    
}
