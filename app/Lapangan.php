<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    public function favorite()
    {
        return $this->hasMany(Favorite::class);
    }

    public function waktus()
    {
        return $this->belongsToMany('App\Waktu');
    }

    public function kategori()
    {
        return $this->belongsTo('App\Kategori', 'kategori_id', 'id');
    }


    public function jenis()
    {
        return $this->belongsTo('App\Jenis', 'jenis_id', 'id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    protected $fillable = [
        'nama_lapangan', 'gambar', 'slug', 'harga', 'kategori_id', 'jenis_id', 'created_by'
    ];
}
