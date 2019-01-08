<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Memory extends Model
{
    protected $fillable = ['image','content'];

    public static function newlists() {

        return Memory::select('id','image','content','created_at')
                     ->orderby('id','desc')
                     ->get();

    }

}
