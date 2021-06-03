@extends('layout/main_home')

@section('title','Toko Kayu NU')

@section('isi')       
<!-- content -->
<form action="{{url('pesan/' .$datas->id)}}" method="POST">
  @csrf
  <section class="py-5">
    <div class="container">
      <div class="row mb-5">
        <div class="col-lg-6">

          <!-- PRODUCT SLIDER-->
          <div class="row m-sm-0">            
            <div class="col-sm-10 order-1 order-sm-2">
              <div class="owl-carousel product-slider" data-slider-id="1">
                  <a class="d-block" href="{{ asset('assets_gambar/gambar_barang/'.$datas->foto) }}" data-lightbox="product" >
                <img class="img-fluid" src="{{ asset('assets_gambar/gambar_barang/'.$datas->foto) }}" alt="..."></a>
                </div>
            </div>
          </div>
        </div>
        <!-- PRODUCT DETAILS-->
        <div class="col-lg-6">

          <h1>{{ $datas->nama_brg }}</h1>
          <p class="text-muted lead">Rp. {{ number_format($datas->harga)}}</p>
          <p class="text-small mb-4">{{ $datas->keterangan }}</p>
          <div class="row align-items-stretch mb-4">
            <div class="col-sm-5 pr-sm-0">
              <div class="border d-flex align-items-center justify-content-between py-1 px-3 bg-white border-white">
                <span class="small text-uppercase text-gray mr-4 no-select">Jumlah pesanan</span>
                
                  <input class="form-control border-0 shadow-0 p-0" type="text" name="jumlah_pesan">
                  
                
              </div>
            </div>
            <div class="col-sm-3 pl-sm-0"><button type="submit" class="btn btn-dark btn-sm btn-block h-100 d-flex align-items-center justify-content-center px-0">Add to cart</button></div>
          </div>
          
          <ul class="list-unstyled small d-inline-block">
            {{--<li class="px-3 py-2 mb-1 bg-white"><strong class="text-uppercase">Kayu:</strong><span class="ml-2 text-muted"></span></li>--}}
            <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Stok:</strong><a class="reset-anchor ml-2" href="#"> {{ $datas->stok }} </a></li>
            <li class="px-3 py-2 mb-1 bg-white text-muted"><strong class="text-uppercase text-dark">Category Kayu:</strong><a class="reset-anchor ml-2" href="#">{{ $datas->kategori }}</a></li>
          </ul>
        </div>
      </div>
      
  </section>
</form>


  <!-- end content -->

  @endsection
  @section('footer')
