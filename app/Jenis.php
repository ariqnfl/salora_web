<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    public function lapangans()
    {
        return $this->hasOne('App\Lapangan');
    }
}
