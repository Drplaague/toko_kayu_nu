@extends('layout/main_admin')

    @section('title','Toko Kayu NU')

        @section('isi')


            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data Barang</h1>
                        <button  class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#tambah_barang">
                            <i class="fas fa-download fa-sm text-white-50"></i> Tambah Data</button>  
                    </div>

                    @if (session('pesan'))
                <div class="alert alert-success">
                    {{ session('pesan') }}
                </div>
                @endif
                
                <!-- Validasi Error data tidak di input -->
                @if ($errors->any())
                <div class="alert align-items-center justify-content mb-4">
                  <h1 class="h5 mb-0 text-gray-700"> Data yang di masukan salah !!!</h1>
                    <ul class="list-group list-group-flush">
                        @foreach ($errors->all() as $error)
                        <li class="list-group-item list-group-item-danger">  {{ $error }} </li> 
                        @endforeach
                    </ul>
                </div>
                @endif 
                <!-- Validasi Error data tidak di input -->

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">List Data Barang</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nomor Telphone</th>
                                        <th>alamat</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Kode Pembayaran</th>
                                        <th>Total Harga bayar</th>
                                        <th colspan="3">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nomor Telphone</th>
                                        <th>alamat</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Kode Pembayaran</th>
                                        <th>Total Harga bayar</th>
                                        <th>Status</th>
                                        <th colspan="3">Aksi</th>
                                    </tr>
                                    
                                </tfoot>
                                <tbody>
                                    <?php $no = 1 ?>
                                    @foreach ($riwayat as $data)
            
                                    <tr>
                                        <td> {{$no++ }} </td>
                                        <td> {{$data->User->name}} </td>
                                        <td> {{$data->User->no_tlp}} </td>
                                        <td> {{$data->User->alamat}} </td>
                                        <td> {{$data->tanggal}} </td>
                                        <td> {{$data->kode}} </td>
                                        <td> {{$data->jumlah_harga}} </td>
                                        <td> {{$data->status}} </td>
                                        
                                        <td> 

                                            <a href="" class="btn btn-success btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-search-plus"></i>
                                                </span>
                                                <span class="text">Detail</span>
                                            </a>
                                        </td>
                                        @endforeach
                                    </tr>
                                    

                                </tbody>
                                
                            </table>
                        </div>
                    </div>
                    
                </div>

            </div>
            <!-- /.container-fluid -->


        @endsection

@section('footer')