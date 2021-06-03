@extends('layout/main_admin')

@section('title','Toko Kayu NU')
@section('isi')
    
<div id="layoutSidenav_content">
  <main>
      <div class="container-fluid">
          <h1 class="mt-4">Detail</h1>
          <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item active">Dashboard</li>
          </ol>

          <!-- card item -->
          <div class="card" style="width: 18rem;">
            <img src="{{ asset('assets_gambar/gambar_barang/'.$data_brg->foto) }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{ $data_brg->nama_brg }}</h5>
              <p class="card-text">{{ $data_brg->keterangan }}</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"></li>
              <li class="list-group-item">{{ $data_brg->kategori }}</li>
              <li class="list-group-item">{{ $data_brg->harga }}</li>
              <li class="list-group-item">{{ $data_brg->stok }}</li>
            </ul>
            <div class="card-body">
              <a href="{{url('/databarang/edit/' .$data_brg->id)}}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</a>
              <a href="{{ url('/databarang') }}" class="btn btn-primary btn-sm d-inline"><i class="far fa-hand-point-left"></i> kembali</a>
            </div>
          </div>
          <!-- card item -->

                  </div>
              </div>
      </div>
  </main>
@endsection
@section('footer')
    

    