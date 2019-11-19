<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Waktu extends Model
{
    public function lapangans(){
        return $this->belongsToMany('App\Lapangan');
    }
}
