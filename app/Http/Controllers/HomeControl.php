<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\databarang;
use App\Models\data_barang;
use App\Models\User;
use App\Models\pesanan_detail;
use App\Models\pesanan;
use Auth;
use Carbon\Carbon;
use SweetAlert;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class HomeControl extends Controller
{
    public function index()
    {
        return view('Home/index');
        
    }
    public function profile()
    {
        $user = User::where('id', Auth::user()->id)->first();
        return view('Home/profile', compact('user'));
       
        
    }
    public function edit()
    {
        $user =  User::where('id', Auth::user()->id)->first();
        return view('Home/edit_profile',compact('user'));
    }
    public function update_profile(Request $request)
    {
        $user =  User::where('id', Auth::user()->id)->first();
        $user->name = $request->name;
        $user->no_tlp = $request->no_tlp;
        $user->kota = $request->kota;
        $user->alamat = $request->alamat;
        $user->email = $request->email;
        

        if (!empty($request->password)) {
            # code...
            $user->password = bcrypt($request->password);
        }
        if (!empty($request->role_id)) {
            # code...
            $user->role_id = '2';
        }

        $user->update();

        return redirect('/profile');
    }
    public function shop(){
        $db = databarang::paginate(6)  ;
        return view('Home/shop')->with('data', $db);
        }
    public function detail($data)
    {
        $datas = databarang:: where('id', $data) -> first();
        return view('Home/detail', compact('datas'));

    }
    public function cart()
    {
        //$barangs = databarang::all();
        $pesanan = pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
        
        if (!empty($pesanan)) {
            # code...
            $details_pesan = pesanan_detail::where('pesanan_id',$pesanan->id)->get();
        }
        return view('Home/cart', compact('pesanan','details_pesan'));
        
    }

    public function histori()
    {
        $pesanan = pesanan::where('user_id',Auth::user()->id)->where('status','!=',0)->get();
        return view('Home/histori', compact('pesanan'));
    }

    public function bayar($data)
    {
        $pesanan = pesanan::where('id', $data)-> first();
        $pesanan_details = pesanan_detail::where('pesanan_id', $pesanan->id)->get();
        return view('Home/cekout', compact('pesanan','pesanan_details'));
    }

    public function pesan(Request $request,$data)
    {
        $barang = databarang:: where('id', $data) -> first();
        $tanggal = Carbon::now();

        //validasi stok
        if ($request->jumlah_pesan > $barang->stok) {
            # code...
            return redirect('detail/'.$data);
        }
        //validasi
        $cek_pesanan  = pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
        if (empty($cek_pesanan)) {
            # code...
        
        //simpan pesanan ke database
        $pesanan = new pesanan;
        $pesanan->user_id = Auth::user()->id;
        $pesanan->tanggal = $tanggal;
        $pesanan->status = 0;
        $pesanan->kode = mt_rand(100,999);
        $pesanan->jumlah_harga = 0;
        $pesanan->save();
        }

        $pesanan_baru = pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();

        //cek pesanan
        $cek_pesanan_detail = pesanan_detail::where('barang_id',$barang->id)->where('pesanan_id', $pesanan_baru->id)->first();
        
        if (empty($cek_pesanan_detail)) {
            # code...
            $detail_pesan = new pesanan_detail;
            $detail_pesan->barang_id = $barang->id;
            $detail_pesan->pesanan_id = $pesanan_baru->id;
            $detail_pesan->jumlah = $request->jumlah_pesan;
            $detail_pesan->jumlah_harga = $barang->harga*$request->jumlah_pesan;
            $detail_pesan->save();
           
        }else {
            # code...
            $detail_pesan = pesanan_detail::where('barang_id',$barang->id)->where('pesanan_id', $pesanan_baru->id)->first();
            $detail_pesan->jumlah =  $detail_pesan->jumlah+$request->jumlah_pesan;
            //harga sekarang
            $harga_detail_pesan_baru = $barang->harga*$request->jumlah_pesan;
            $detail_pesan->jumlah_harga = $detail_pesan->jumlah_harga+$harga_detail_pesan_baru;
            $detail_pesan->update();
        } 

        //total jumlah
        $pesanan =  pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
        $pesanan->jumlah_harga =  $pesanan->jumlah_harga+ $barang->harga*$request->jumlah_pesan;
        $pesanan->update();

       
        return redirect('/shop');
       
    }
    public function delete($datas)
    {
        $pesanan_detail = pesanan_detail::where('id',$datas) ->first();
        $pesanan = pesanan::where('id',$pesanan_detail->pesanan_id) ->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga-$pesanan_detail->jumlah_harga;
        $pesanan->update();
        $pesanan_detail->delete();

        
        return redirect('/cart');
        
    }

    public function cekout()
    {
        
        
        $pesanan = pesanan::where('user_id',Auth::user()->id)->where('status',0)->first();
        $pesanan_id = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->update();

        $pesanan_detail = pesanan_detail::where('pesanan_id', $pesanan_id)->get();
        foreach ($pesanan_detail as $pesanan_details) {
            # code...
            $barang = databarang::where('id' , $pesanan_details->barang_id)->first();
            $barang->stok = $barang->stok-$pesanan_details->jumlah;
            $barang->update();
        }
        

        return redirect('bayar/' .$pesanan_id);
    }
}
