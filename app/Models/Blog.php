<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;

class Blog extends Model
{
    protected $fillable = ['title','content','accessable'];

    public function user() {

        return $this->belongsTo('App\Models\User','user_id');

    }

    public static function newBlogs() {

        return Blog::where('accessable','public')
                   ->orderBy('id','desc')
                   ->with('user')
                   ->paginate(3);
                   
    }

    public static function top10() {

        return Cache::remember('top10', 3, function(){

            return Blog::select('id','title','created_at')
                    ->where('accessable','public')
                    ->take(3)
                    ->get();

        });
    }

    public static function viewAndAddDisplay($id) {
        
        $blog = Blog::find($id);
        
        $blog->increment('display');
        
        return $blog;
    
    }

}
