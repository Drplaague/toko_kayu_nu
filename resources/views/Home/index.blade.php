@extends('layout/main_home')

@section('title','Toko Kayu NU')

@section('isi')      
<!-- content -->
      <!-- HERO SECTION-->
      <div class="container">
        <section class="hero pb-3 bg-cover bg-center d-flex align-items-center" style="background: url({{ asset('assets/HomeTemplate/img/hero-banner-alt.jpg') }})">
          <div class="container py-5">
            <div class="row px-4 px-lg-5">
              <div class="col-lg-6">
                <p class="text-muted small text-uppercase mb-2">New Inspiration 2021</p>
                <h1 class="h2 text-uppercase mb-3">New Season</h1><a class="btn btn-dark" href=" {{url('/shop')}} ">Masuk Kekoleksi</a>
              </div>
            </div>
          </div>
        </section>
        <!-- CATEGORIES SECTION-->
        <section class="pt-5">
          <header class="text-center">
            <p class="small text-muted small text-uppercase mb-1">Carefully created collections</p>
            <h2 class="h5 text-uppercase mb-4">Browse our categories</h2>
          </header>
          <div class="row">
            <div class="col-md-4 mb-4 mb-md-0"><a class="category-item" href=" {{url('/shop')}} "><img class="img-fluid" src="{{ asset ('assets/HomeTemplate/img/cat-img-1.jpg') }}" alt=""><strong class="category-item-title">Kursi</strong></a></div>
            <div class="col-md-4 mb-4 mb-md-0"><a class="category-item mb-4" href=" {{url('/shop')}} "><img class="img-fluid" src="{{ asset ('assets/HomeTemplate/img/cat-img-2.jpg') }}" alt=""><strong class="category-item-title">Pintu</strong></a>
              <a class="category-item" href=" {{url('/shop')}} "><img class="img-fluid" src="{{ asset('assets/HomeTemplate/img/cat-img-3.jpg') }}" alt=""><strong class="category-item-title">Meja</strong></a></div>
            <div class="col-md-4"><a class="category-item" href=" {{url('/shop')}} "><img class="img-fluid" src="{{ asset ('assets/HomeTemplate/img/cat-img-4.jpg') }}" alt=""><strong class="category-item-title">Lemari</strong></a></div>
          </div>
        </section>
        
      </div>
      <!-- end content -->

      @endsection
@section('footer')