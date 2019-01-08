<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;
// use Cache;

class IndexController extends Controller
{

    
    public function ajaxnewblogs() {

        $blogs = Blog::newBlogs();

        return $blogs;

    }

    public function errora() {

        return view('error.index');

    }

    public function index() {

        $acUsers = User::acUsers();

        $top10 = Blog::top10();

        return view('index.index',[

            'acUsers'=>$acUsers,
            'top10'=>$top10,
            

        ]);

    }


    public function blog($id) {

        
        $blog = Blog::viewAndAddDisplay($id);

        
        $top10 = Blog::top10();

        return view('index.blog', [
            'blog' => $blog,
            'top10' => $top10,
        ]);
    }

    public function abouta() {

        return view('about.about');

    }

}
