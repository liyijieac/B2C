<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cache;
use DB;

class User extends Model
{
    protected $fillable = ['username','password','mobile','image'];

    public static function acUsers() {

        return Cache::remember('acUsers', 60, function() {

            return Blog::select('user_id')
                       ->where('created_at','>=',DB::raw('NOW() - INTERVAL 24 HOUR '))
                       ->where('accessable','public')
                       ->groupBy('user_id')
                       ->orderBy(DB::raw('COUNT(*)'),'desc')
                       ->take(9)
                       ->with('user')
                       ->get();

        });

    }
    
}
