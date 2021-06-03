<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\pesanan_detail;
use App\Models\pesanan;
use App\Models\user;

class databarang extends Model
{
    use HasFactory;
    protected $table = 'databarang';
    //protected $fillable = ['id','nama_brg','keterangan','kategori','harga','stok','foto'];
    

    /*public function getFoto()
    {
        if (!$this->foto) {
            # code...
            return asset('assets_gambar/gambar_barang/default.jpg');
        }
        return asset('assets_gambar/gambar_barang/' $this->foto);
    }*/
    public function pesanan_detail()
    {
        return $this->hasMany(pesanan_details::class,'barang_id')->withDefault();
    }
}
