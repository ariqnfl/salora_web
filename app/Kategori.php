<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public function lapangans()
    {
        return $this->hasOne('App\Lapangan','kategori_id','id');
    }
}
