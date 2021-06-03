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
                                        <th>Nama Barang</th>
                                        <th>Keterangan</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th colspan="3">Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Barang</th>
                                        <th>Keterangan</th>
                                        <th>Kategori</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th colspan="3">Aksi</th>
                                    </tr>
                                    
                                </tfoot>
                                <tbody>

                                    @foreach ($barang as $no => $data)
            
                                    <tr>
                                        <td> {{$barang -> firstitem() + $no}} </td>
                                        <td>{{$data -> nama_brg}} </td>
                                        <td> {{$data -> keterangan}} </td>
                                        <td> {{$data -> kategori}} </td>
                                        <td> {{$data -> harga}} </td>
                                        <td> {{$data -> stok}} </td>
                                        <td> 

                                            <a href="{{url('/databarang/detail/' .$data->id )}}" class="btn btn-success btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-search-plus"></i>
                                                </span>
                                                <span class="text">Detail</span>
                                            </a>

                                        {{--<a href="{{url('/databarang/detail/' .$data -> id )}}" class="btn btn-success btn-sm">
                                            <i class="fas fa-search-plus"></i> Detail</a>--}}

                                       
                                        {{--<a href="{{url('/databarang/detail/' .$data -> id )}}">detail</a> --}}
                                        
                                        </td>
                                        {{--<td> <a href="{{url('/databarang/edit/')}}" class="btn btn-primary btn-sm"><i class="fas fa-edit"></i>Edit</a>  </td>--}}
                                        <form action="{{url('databarang/' .$data -> id )}}" method="post">
                                         @method('delete')
                                        @csrf
                                        <td> 
                                            <button href="#" class="btn btn-danger btn-icon-split">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-trash"></i>
                                                </span>
                                                <span class="text">Hapus</span>
                                            </button>
                                        </td>
                                        </form>
                                        @endforeach
                                    </tr>
                                    

                                </tbody>
                                
                            </table>
                        </div>
                        {{ $barang->links() }}
                    </div>
                    
                </div>

                <!-- Modal (pop up form) -->
<div class="modal fade" id="tambah_barang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Input Produk</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
  
          <form action=" {{ route('store') }} " method="post" enctype="multipart/form-data">
  
            {{ csrf_field() }}
  
            <div class="form-group">
  
              <label class="form-label">Nama Barang</label>
              <input type="text" name="nama_brg" class="form-control @error ('nama_brg') is-invalid @enderror"
              value="{{ old('nama_brg')}}">
             
              <!-- css error validasi -->
              @error('nama_brg') 
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
              <!-- css error validasi -->
  
            </div>
  
            <div class="form-group">
              <label for="validationTextarea" class="form-label">Keterangan</label>
             
              <textarea type="text" rows="3" name="keterangan" class="form-control 
              @error ('keterangan') is-invalid @enderror" 
              id="validationTextarea">
  
              {{--@error('keterngan') 
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror --}}
           
            </textarea>
            </div>
           
  
            <div class="form-group">
              <label class="form-label">Kategori</label>
              <select class="form-control @error ('kategori') is-invalid @enderror" 
              name="kategori">
                <option selected disabled value=""> Pilih kategori... </option>
                <option>Kayu Glugu</option>
                <option>Kayu Jati</option>
                <option>Kayu Bengkir</option>
                <option>Kayu Jawa</option>
                <option>Kayu Kalimantan</option>
                <option>Kayu Meranti</option>
                <option>Kayu Mahoni</option>
                <option>Kayu Terembesi</option>
              </select>
  
              @error('kategori') 
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
  
            <div class="form-group">
              <label class="form-label">Harga</label>
              <input type="text" name="harga" class="form-control @error ('harga') is-invalid @enderror"
              value="{{ old('harga')}}">
              @error('harga') 
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
  
            <div class="form-group">
              <label class="form-label">Stok</label>
              <input type="text" name="stok" class="form-control @error ('stok') is-invalid @enderror"
              value="{{ old('stok')}}">
              @error('stok') 
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
  
            <div class="form-group">
              <label class="form-label">Gambar Produk</label><br>
              <input type="file" name="foto" class="form-control @error ('foto') is-invalid @enderror">
              @error('stok') 
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
  
        </div>
  
       
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
  
        </form>
      </div>
    </div>
  </div>
  <!-- Modal (pop up form) -->

            </div>
            <!-- /.container-fluid -->


        @endsection

@section('footer')