<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function lapangan()
    {
        return $this->belongsToMany(Lapangan::class);
    }

    protected $fillable = [
        'user_id','total_harga','bukti','waktu_pesan','tanggal_pesan','status'
    ];
}
