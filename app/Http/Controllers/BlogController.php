<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Requests\BlogRequest;
use Validator;
use Storage;
use DB;
use App\Models\Ding;


class BlogController extends Controller
{
    public function lista() {

        $blogs = Blog::where('user_id',session('id'))->paginate(4);

        return view('blog.lista',[

            'blogs'=>$blogs,

        ]); 

    }

    public function edit($id) {

        $blog = Blog::find($id);

        if($blog->user_id != session('id')) {

            return back;

        }

        return view('blog.edit', [
            'blog' => $blog,
        ]);

    }

    public function ding($blog_id) {
        
        $has = Ding::where('user_id',session('id'))
                ->where('blog_id',$blog_id)
                ->count();

        if($has == 0) {
            $blog_id = (int)$blog_id;

            if($blog_id==0) {
                return [
                    'errno' => 1,
                    'errmsg' => 'Parameter error',
                ];
            }

            $blog = Blog::find( $blog_id );

            if(!$blog) {
                return [
                    'errno' => 1,
                    'errmsg' => 'Parameter error',
                ];
            }

            $blog->increment('zhan',1);
            
            $ding = new Ding;
            
            $ding->fill([

                'user_id' => session('id'),
                'blog_id' => $blog_id,
            
            ]);

            $ding->save();
           
            return [
                'errno' => 0
            ];
        }else {
            return [
                'errno' => 3,
                'errmsg' => 'Only once OK ?',
            ];
        }

    }

    public function doedit(Request $req , $id) {

        $blog = Blog::where('id',$id)
                    ->where('user_id',session('id'))
                    ->first();

        if(!$blog)
        
            return back();

        $blog->fill( $req->all() );

        if($req->has('image') && $req->image->isValid() ) {

            $image = $req->image->store(date('Y-m-d'));

            Storage::delete($blog->image);

            $blog->image = $image;

        }

        $blog->save();

        return redirect()->route('myblogs');

    }

    public function delete($id) {

        $blog = Blog::find($id);

        if($blog->user_id != session('id'))

            return back();

        Storage::delete($blog->image);

        $blog->delete();

        return redirect()->route('myblogs');

    }

    public function write() {

        return view('blog.writeblog');

    }

    public function dowrite(BlogRequest $req) {

        $blog = new Blog;
        
        $blog->user_id = session('id');
        
        $blog->fill( $req->all() );
        
        if($req->has('image')&& $req->image->isValid()) {

            $image = $req->image->store(date('Y-m-d'));

            $blog->image = $image;

        }

        $blog->save();
        
        return redirect()->route('myblogs');

    }

}
