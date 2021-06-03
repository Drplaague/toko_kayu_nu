@extends('layout/main_home')
@include('sweet::alert') 
@section('title','Toko Kayu NU')

@section('isi')   
 
<!-- content -->
  <div class="container"> 

    <!-- HERO SECTION-->
    <section class="py-5 bg-light">
      <div class="container">
        <div class="row px-4 px-lg-5 py-lg-4 align-items-center">
          <div class="col-lg-6">
            <h1 class="h2 text-uppercase mb-0">Cart</h1>
          </div>
          <div class="col-lg-6 text-lg-right">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cart</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>

    <section class="py-5">
      <h2 class="h5 text-uppercase mb-4">Shopping cart</h2>
      <p>Tanggal pesanan : {{ $pesanan->tanggal }}</p>
      <div class="row">
        <div class="col-lg-8 mb-4 mb-lg-0">
          <!-- CART TABLE-->
          @if(!empty($pesanan))
          <div class="table-responsive mb-4">
            <table class="table">
              <thead class="bg-light">
                <tr>
                  <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Produk</strong></th>
                  <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Harga</strong></th>
                  <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Jumlah barang</strong></th>
                  <th class="border-0" scope="col"> <strong class="text-small text-uppercase">Total</strong></th>
                  <th class="border-0" scope="col"> </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($details_pesan as $data_ps)
                <tr>
                  <th class="pl-0 border-0" scope="row">
                    <div class="media align-items-center">
                        <a class="reset-anchor d-block animsition-link" href="detail.html">
                            <img src="{{ asset('assets_gambar/gambar_barang/'.$data_ps->databarang->foto) }}" alt="..." width="70"/></a>
                      <div class="media-body ml-3"><strong class="h6">
                          <a class="reset-anchor animsition-link" href="detail.html"></a></strong></div>
                    </div>
                  </th>
                  <td class="align-middle border-0">
                    <p class="mb-0 small">Rp. {{ number_format($data_ps->databarang->harga)}}</p>
                  </td>
                  
                  
                  <td class="align-middle border-0">
                    <div class=" d-flex align-items-center justify-content-between px-3">
                        <span class="small text-uppercase headings-font-family"> {{ number_format($data_ps->jumlah)}}</span>
                    </div>
                  </td>
                  <td class="align-middle border-0">
                    <p class="mb-0 small">Rp. {{ number_format($data_ps->jumlah_harga)}}</p>
                  </td>
                  <form action="{{url('cart/' .$data_ps -> id )}}" method="post">
                    @method('delete')
                   @csrf
                  <td class="align-middle border-0"><button class="reset-anchor"  onclick="return confirm('Anda yakin akan Menghapus Barang ?');"><i class="fas fa-trash-alt small text-muted"></i></button></td>
                  </form>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- CART NAV-->
          <div class="bg-light px-4 py-3">
            <div class="row align-items-center text-center">
              <div class="col-md-6 mb-3 mb-md-0 text-md-left"><a class="btn btn-link p-0 text-dark btn-sm" href="{{ url('/shop') }}">
                <i class="fas fa-long-arrow-alt-left mr-2"> </i>Continue shopping</a></div>
              <div class="col-md-6 text-md-right"><a class="btn btn-outline-dark btn-sm" href="{{ url('/cart/bayar') }}" onclick="return confirm('Anda yakin akan Check Out / membayar Barang tersebut ?');">Check Out<i class="fas fa-long-arrow-alt-right ml-2"></i></a></div>
            </div>
          </div>
        </div>
        @endif
        <!-- ORDER TOTAL-->
        <div class="col-lg-4">
          <div class="card border-0 rounded-0 p-lg-4 bg-light">
            <div class="card-body">
              <h5 class="text-uppercase mb-3">Cart total</h5>
              <strong class="text-uppercase small font-weight-bold ">Subtotal</strong>
              <ul class="list-unstyled mb-0">
                @foreach ($details_pesan as $data_ps)
                <li class="d-flex align-items-center justify-content-between">
                  <span class="text-muted small">Rp. {{ number_format($data_ps->jumlah_harga)}}</span></li>
                @endforeach
                <li class="border-bottom my-2"></li>
                <li class="d-flex align-items-center justify-content-between mb-4">
                  <strong class="text-uppercase small font-weight-bold">Total</strong><span>Rp. {{ number_format($pesanan->jumlah_harga)}}</span></li>
                
              </ul>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
    <!-- end content -->

    @endsection
    @section('footer')