<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\databarang;
use App\Models\User;
use App\Models\pesanan_detail;
use App\Models\pesanan;
use Auth;
use Carbon\Carbon;

use Illuminate\Support\Str;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\RequestDataBarang;



class Control_admin extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // admin
        return view('admin/index');
    }

    public function login()
    {
        return view('login');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function val_login(Request $request)
    {
        if (Auth::attempt($request->only('email','password'))) {
            # code...
            return redirect('/dashboard');
        }
        return redirect('login');
    }

    public function register()
    {
        return view('daftar_login');
    }

    public function val_register(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4',
            'email' => 'required|min:4|email|unique:users',
            'password' => 'required|min:8',
            'confirmation' => 'required|same:password',
        ]);

        $data =  new User();
        $data->name = $request->name;
        $data->role_id = '2';
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->remember_token = Str::random(60);
        $data->save();
        return redirect('/login');
    }

    public function detail(databarang $data_brg){
        
        return view('admin/detail',compact('data_brg'));
    }

    public function data_barang()
    {
        $barang = databarang::paginate(10);
        return view('admin/databarang',['barang' => $barang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //tambah data
        $barang = databarang::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestDataBarang $request)
    {
        //validasi databse

        $this -> validate($request,[
            'nama_brg' => 'required',
            'keterangan' => 'required',
            'kategori' => 'required',
            'harga' => 'required',
            'stok' => 'required',
            'foto' => 'required'
        ]);
        
        //input database
        $databarang = new databarang;
        $databarang -> nama_brg = $request -> nama_brg;
        $databarang -> keterangan = $request -> keterangan;
        $databarang -> kategori = $request -> kategori;
        $databarang -> harga = $request -> harga;
        $databarang -> stok = $request -> stok;

        $request->file('foto')->move('assets_gambar/gambar_barang/',$request->file('foto')->getClientOriginalName());
            $databarang->foto =  $request->file('foto') ->getClientOriginalName();
        $databarang-> save();
        
        /*
        Session::put('nama_brg',$databarang->nama_brg);
        Session::put('keterangan',$databarang->keterangan);
        Session::put('kategori',$databarang->kategori);
        Session::put('harga',$databarang->harga);
        Session::put('stok',$databarang->stok);
       */

      $validated = $request->validated();
      return redirect('/databarang') -> with('pesan', 'Data Tersimpan!!');

      /*$validated = $request->validate( [
        'nama_brg' => 'required'
        
        ]);

        if ($errors->has('nama_brg')) {
            return redirect('/databarang') -> with('pesan', 'Data salah!!!');
        }else{
            return redirect('/databarang') -> with('pesan', 'Data Tersimpan!!');
        }
        */
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\databarang  $databarang
     * @return \Illuminate\Http\Response
     */
    public function show(databarang $databarang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\databarang  $databarang
     * @return \Illuminate\Http\Response
     */
    public function edit(databarang $data_brg)
    {
        // edit data
        return view('admin/editdata',compact('data_brg'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\databarang  $databarang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, databarang $data_brg)
    {
        //update data
        databarang::where('id', $data_brg->id)
        ->update([
            'nama_brg' => $request->nama_brg,
            'keterangan' => $request->keterangan,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'foto' =>  $request->foto
            
        ]);
        if ($request->hasFile('foto')) {
            # code...
            $request->file('foto')->move('assets_gambar/gambar_barang/',$request->file('foto')->getClientOriginalName());
            $data_brg->foto =  $request->file('foto') ->getClientOriginalName();
            $data_brg->update();
        }
        return redirect('/databarang') -> with('pesan', 'Data berhasil di Update!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\databarang  $databarang
     * @return \Illuminate\Http\Response
     */
    public function destroy(databarang $data)
    {
        // hapus data
        databarang::destroy($data->id);
        return redirect('/databarang') -> with('pesan', 'Data Terhapus!!');
    }
    public function riwayat()
    {
        //$riwayat = pesanan::where('user_id',Auth::user()->id)->first();
        //$riwayat = pesanan::where('id', $data) -> first();
        //return view('admin/riwayat',compact('riwayat'));

        $db = pesanan::all();
        return view('admin/riwayat')->with('riwayat', $db);
    }
}
