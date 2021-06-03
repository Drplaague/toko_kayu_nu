<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\databarang;
use App\Models\data_barang;
use App\Models\User;
use App\Models\pesanan_detail;

class pesanan extends Model
{
    use HasFactory;
    protected $table = 'pesanans';

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function pesanan_detail()
    {
        return $this->hasMany(pesanan_details::class,'pesanan_id');
    }
}
