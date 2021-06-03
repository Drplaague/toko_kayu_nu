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
            <h1 class="h2 text-uppercase mb-0">Checkout</h1>
          </div>
          <div class="col-lg-6 text-lg-right">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                <li class="breadcrumb-item"><a href=" {{ url('/')}} ">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>
    <section class="py-5">
      <!-- BILLING ADDRESS-->
      <h2 class="h5 text-uppercase mb-4">Billing details</h2>
      <div class="row">
        <div class="col-lg-8">
          <form action="#">
            <div class="row">

              <div class="card mb-4 col-lg-12" id="tables">
              <div class="card-header">Tanggal Pesan : {{ $pesanan->tanggal }} </div>
              
              
              <div class="card-body">

                <table class="table table-striped table-bordered table-condensed">
                  <thead>
                    <tr>
                      <th>no</th>
                      <th>Foto / Gambar</th>
                      <th>Nama Barang </th>
                      <th>Harga </th>
                      <th>Jumlah Barang</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php $no = 1 ?>
                    @foreach ($pesanan_details as $data_ps)
                    <tr>
                        <td> {{$no++ }} </td>
                        <td> {{ $data_ps->databarang->nama_brg }} </td>
                        <td><img src="{{ asset('assets_gambar/gambar_barang/'.$data_ps->databarang->foto) }}" alt="..." width="70"/></a></td>
                        <td>Rp. {{ number_format($data_ps->databarang->harga)}}</td>
                        
                        <td> {{ number_format($data_ps->jumlah)}} </td>
                        
                        <td>Rp. {{ number_format($data_ps->jumlah_harga)}} </td>
                        
                        
                        </tr>
                        @endforeach
                  </tbody>
                </table>
                
              
            </div>
          </div>

              <div class="col-lg-12 form-group">
                <a class="btn btn-dark" href=" {{ url('/')}} ">Kembali</a>
              </div>
            </div>
          </form>
        </div>
        
        <!-- ORDER SUMMARY-->
        <div class="col-lg-4">
          <div class="card border-0 rounded-0 p-lg-4 bg-light">
            <div class="card-body">
              <h5 class="text-uppercase mb-4">Orderan</h5>
              <ul class="list-unstyled mb-0">
                <li class="d-flex align-items-center justify-content-between"><strong class="small font-weight-bold">Total harga</strong><span class="text-muted small">Rp. {{ number_format($pesanan->jumlah_harga)}}</span></li>
                <li class="border-bottom my-2"></li>
                <li class="d-flex align-items-center justify-content-between"><strong class="small font-weight-bold">Kode unik</strong><span class="text-muted small">Rp.{{ number_format($pesanan->kode)}} </span></li>
                <li class="border-bottom my-2"></li>
                <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Total bayar</strong><span>Rp. {{ number_format($pesanan->kode+$pesanan->jumlah_harga)}}</span></li>
                <li class="border-bottom my-2"></li>
                <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">Di transferkan ke BCA : </strong><span> 9872767 </span></li>
                <li class="d-flex align-items-center justify-content-between"><strong class="text-uppercase small font-weight-bold">No Hp konfirmasi : </strong><span> 089727856 </span></li>
              </ul>
            </div>
          </div>

        </div>

        </div>
      </div>
    </section>
  </div>

      <!-- end content -->

      @endsection
      @section('footer')