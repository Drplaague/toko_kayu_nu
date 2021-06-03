@extends('layout/main_home')

@section('title','Toko Kayu NU')

@section('isi')      
<!-- content -->
  <div class="container">  
    <!-- HERO SECTION-->
    <section class="py-5 bg-light">
      <div class="container">
        <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
          <div class="col-lg-6">
            <h1 class="h2 text-uppercase mb-0">Edit Profile</h1>
          </div>
          <div class="col-lg-6 text-lg-right">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ url('/profile') }}">Profile</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>
    
    <section class="py-5">
      <!-- BILLING ADDRESS-->
      <h2 class="h5 text-uppercase mb-4">Edit Profile</h2>
      <div class="row">
        <div class="col-lg-atuo">

            <form action="{{ route('ubah') }}" method="post">
                @csrf
                
            <div class="row">
              <div class="col-lg-6 form-group">
                <label class="text-small text-uppercase" for="firstName">Nama</label>
                <input class="form-control form-control-lg" id="firstName" type="text" value="{{ $user->name }}" name="name" autocomplete="name">
              </div>
              <div class="col-lg-6 form-group">
                <label class="text-small text-uppercase" for="email">Email</label>
                <input class="form-control form-control-lg" id="email" type="email" value="{{ $user->email }}" name="email">
              </div>
              <div class="col-lg-6 form-group">
                <label class="text-small text-uppercase" for="phone">Nomor Telphone</label>
                <input class="form-control form-control-lg" id="phone" type="tel" value="{{ $user->no_tlp }}" name="no_tlp">
              </div>
        
              <div class="col-lg-6 form-group">
                <label class="text-small text-uppercase" for="kota">Kota </label>
                <input class="form-control form-control-lg" id="kota" type="text" value="{{ $user->kota }}" name="kota">
              </div>
              <div class="col-lg-6 form-group">
                <label class="text-small text-uppercase" for="password">Password </label>
                <input class="form-control form-control-lg" id="password" type="text" placeholder="Masukan Password" name="password">
              </div>
              <div class="col-lg-6 form-group">
                <label class="text-small text-uppercase" for="confirmation">Komfirmasi Password </label>
                <input class="form-control form-control-lg" id="confirmation" type="text" placeholder="Masukan Konfirmasi Password" name="confirmation">
              </div>
              <div class="col-lg-12 form-group">
                <label class="text-small text-uppercase" for="address">Alamat</label>
                <input class="form-control form-control-lg" id="address" type="text"value="{{ $user->alamat }}" name="alamat">
              </div>

              <div class="col-lg-12 form-group">
                <button class="btn btn-primary" type="submit" onclick="return confirm('Apa anda yakin ingin Edit Profile ?');">Edit Profile</button>
                <a class="btn btn-dark" href="{{ url('/profile') }}">Kembali</a>
              </div>
            </div>
            
          </form>
        </div>
       
      </div>
    </section>
  </div>

      <!-- end content -->

      @endsection
      @section('footer')