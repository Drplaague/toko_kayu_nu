<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\data_barang;
use App\Models\databarang;
use App\Models\User;
use App\Models\pesanan;

class pesanan_detail extends Model
{
    use HasFactory;
    protected $table = 'pesanan_details';


    public function databarang()
    {
        return $this->belongsTo(databarang::class,'barang_id')->withDefault();
    }

    /*public function data_barang()
    {
        return $this->belongsTo(data_barangs::class,'barang_id')->withDefault();
    }*/

    public function pesanan()
    {
        return $this->belongsTo(pesanans::class,'pesanan_id')->withDefault();
    }
}
