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
            <h1 class="h2 text-uppercase mb-0">Riwayat Pesanan</h1>
          </div>
          <div class="col-lg-6 text-lg-right">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb justify-content-lg-end mb-0 px-0">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item"><a href="cart.html">Profile</a></li>
                <li class="breadcrumb-item active" aria-current="page">Riwayat Pesanan</li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </section>

    <section class="py-5">
      <!-- BILLING ADDRESS-->
      <div class="card mb-4" id="tables">
              <div class="card-header">Tables</div>
              <div class="card-body">
                
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>no</th>
                      <th>Tanggal</th>
                      <th>Status</th>
                      <th>Jumlah Harga</th>
                      <th colspan="3">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php $no = 1 ?>
                    @foreach ($pesanan as $data)
                    <tr>
                        <td> {{$no++ }} </td>
                        <td> {{$data->tanggal}} </td>
                       
                        <td>  @if($data->status==1)
                            Sudah pesan & belum di bayar
                            @else
                            Sudah bayar
                            @endif
                        </td>
                        
                        <td>Rp. {{ number_format( $data->jumlah_harga+$data->kode )}} </td>
                        <td>
                            <a class="text-uppercase bold btn btn-primary btn-sm h-100 align-items-center justify-content-center" href="{{ url('bayar/' .$data->id ) }}">Detail</a>
                        </td>
                        </tr>
                        @endforeach
                  </tbody>
                </table>

              </div>
            </div>
          </div>
    </section>
  </div>

      <!-- end content -->

      @endsection
      @section('footer')