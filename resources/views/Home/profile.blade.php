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
              <h1 class="h2 text-uppercase mb-0">Profile</h1>
            </div>
            <div class="col-lg-6 text-lg-right">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                  <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
              </nav>
            </div>
          </div>
        </div>
      </section>  

    <section class="py-5">
    <div class="card mb-4" id="tables">
        <div class="card-body">
            <table class="table">
                
                <tbody>
                  <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td>{{$user->name}}</td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>:</td>
                    <td>{{$user->email}}</td>
                  </tr>
                  <tr>
                    <td>Nomor Telphone</td>
                    <td>:</td>
                    <td>{{$user->no_tlp}}</td>
                  </tr>
                  <tr>
                    <td>Kota</td>
                    <td>:</td>
                    <td>{{$user->kota}}</td>
                  </tr>
                  <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{$user->alamat}}</td>
                  </tr>
                </tbody>
              </table>
               
            <fieldset>
          <a class="text-uppercase bold btn btn-primary btn-sm h-100 align-items-center justify-content-center" href="{{ url('/edit_profile') }}">Edit Profile</a>
          <a class="text-uppercase bold btn btn-dark btn-sm h-100 align-items-center justify-content-center" href="{{ url('/histori') }}">Riwayat Pesanan</a>
        </fieldset>
      </div>
    </div>
</section>

  </div>

      <!-- end content -->

      @endsection
      @section('footer')