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
            <h1 class="h2 text-uppercase mb-0">Shop</h1>
          </div>
          <div class="col-lg-6 text-lg-right">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shop</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>

    <section class="py-5">
      <div class="container p-0">
        <div class="row">
          <!-- SHOP SIDEBAR-->
          <div class="col-lg-3 order-2 order-lg-1">
            <h5 class="text-uppercase mb-4">Categories</h5>
            <div class="py-2 px-4 bg-dark text-white mb-3"><strong class="small text-uppercase font-weight-bold">Kategori kayu </strong></div>
            <ul class="list-unstyled small text-muted pl-lg-4 font-weight-normal">
              <li class="mb-2"><a class="reset-anchor" href="#">Kayu Glugu</a></li>
              <li class="mb-2"><a class="reset-anchor" href="#">Kayu Jati</a></li>
              <li class="mb-2"><a class="reset-anchor" href="#">Kayu Bengkir</a></li>
              <li class="mb-2"><a class="reset-anchor" href="#">Kayu Jawa</a></li>
              <li class="mb-2"><a class="reset-anchor" href="#">Kayu Kalimantan</a></li>
              <li class="mb-2"><a class="reset-anchor" href="#">Kayu Mahoni</a></li>
            </ul>
            <div class="py-2 px-4 bg-light mb-3"><strong class="small text-uppercase font-weight-bold">Peralatan</strong></div>
                <ul class="list-unstyled small text-muted pl-lg-4 font-weight-normal">
                  <li class="mb-2"><a class="reset-anchor" href="#">Lemari</a></li>
                  <li class="mb-2"><a class="reset-anchor" href="#">Kursi</a></li>
                  <li class="mb-2"><a class="reset-anchor" href="#">Meja</a></li>
                  <li class="mb-2"><a class="reset-anchor" href="#"></a></li>
                  <li class="mb-2"><a class="reset-anchor" href="#"></a></li>
                  <li class="mb-2"><a class="reset-anchor" href="#"></a></li>
                </ul>
          </div>

          <!-- SHOP LISTING-->
          <div class="col-lg-9 order-1 order-lg-2 mb-5 mb-lg-0">
            <div class="row mb-3 align-items-center">
              <div class="col-lg-6 mb-2 mb-lg-0">
                <p class="text-small text-muted mb-0"></p>
              </div>
              <div class="col-lg-6">
                <ul class="list-inline d-flex align-items-center justify-content-lg-end mb-0">
                  <li class="list-inline-item text-muted mr-3"><a class="reset-anchor p-0" href="#"><i class="fas fa-th-large"></i></a></li>
                  <li class="list-inline-item text-muted mr-3"><a class="reset-anchor p-0" href="#"><i class="fas fa-th"></i></a></li>
                  <li class="list-inline-item">
                    <select class="selectpicker ml-auto" name="sorting" data-width="200" data-style="bs-select-form-control" data-title="Default sorting">
                      <option value="default">Default sorting</option>
                      <option value="popularity">Popularity</option>
                      <option value="low-high">Price: Low to High</option>
                      <option value="high-low">Price: High to Low</option>
                    </select>
                  </li>
                </ul>
              </div>
            </div>
            <div class="row">

              @foreach($data as $datas)
              <!-- PRODUCT-->
              <div class="col-lg-4 col-sm-6">
                <div class="product text-center">
                  <div class="mb-3 position-relative">
                    <div class="badge text-white badge-"></div>
                    <a class="d-block" href="{{url('detail/' .$datas->id)}}"><img class="img-fluid w-100" src="{{ asset('assets_gambar/gambar_barang/'.$datas->foto) }}" alt="..."></a>
                    <div class="product-overlay">
                      <ul class="mb-0 list-inline">
                        <li class="list-inline-item m-0 p-0"><a class="btn btn-sm btn-dark" href="{{url('detail/' .$datas->id)}}">Add to cart</a></li>
                      </ul>
                    </div>
                  </div>
                  <h6> <a class="reset-anchor" href="detail.html">{{ $datas->nama_brg }}</a></h6>
                  <p class="small text-muted">Rp. {{ number_format($datas->harga)}}</p>
                </div>
              </div>
              @endforeach
            <!-- PAGINATION-->
            <nav aria-label="Page navigation example">

              {{ $data->links('vendor.pagination.custom') }}

            </nav>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end content -->

  <script>
    
    $(document).on('ajaxComplete ready', function () {
        $('.productView').off('click').on('click', function () {
            $('#modalMdContent').load($(this).attr('value'));
            $('#modalMdTitle').html($(this).attr('title'));
        });
    });
    </script>

  @endsection
  @section('footer')