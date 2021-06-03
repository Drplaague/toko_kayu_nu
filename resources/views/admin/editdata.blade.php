@extends('layout/main_admin')

@section('title','Toko Kayu NU')
@section('isi')
    
<div id="layoutSidenav_content">
  <main>
      <div class="container-fluid">
          <h1 class="mt-4">Edit Data Barang</h1>

          <!-- form edit -->
          <form action=" {{ url('edit/' .$data_brg->id) }} " method="post" enctype="multipart/form-data">
            @method('patch')
            {{ csrf_field() }}
  
            <div class="form-group">
  
              <label class="form-label">Nama Barang</label>
              <input type="text" name="nama_brg" class="form-control @error ('nama_brg') is-invalid @enderror"
              value="{{ $data_brg->nama_brg}}">
             
              <!-- css error validasi -->
              @error('nama_brg') 
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
              <!-- css error validasi -->
  
            </div>

            {{--
            <div class="form-group">
              <label for="validationTextarea" class="form-label">Keterangan</label>
             
              <textarea type="text" rows="3" name="keterangan" class="form-control 
              @error ('keterangan') is-invalid @enderror" 
              id="validationTextarea">
  
              {@error('keterngan') 
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror 
           
            </textarea>
            </div>
           --}}

           @isset($data_brg)
           <div class="form-group">
            <label for="validationTextarea" class="form-label">Keterangan</label>
           
            <textarea type="text" rows="3" name="keterangan" class="form-control 
            @error ('keterangan') is-invalid @enderror" 
            id="validationTextarea">

            {{$data_brg->keterangan}}
           
         
          </textarea>
          @else
          <textarea type="text" rows="3" name="keterangan" class="form-control 
            @error ('keterangan') is-invalid @enderror" 
            id="validationTextarea"></textarea>
            @endIf
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
                <option value="">Kayu Meranti</option>
                <option value="">Kayu Mahoni</option>
                <option value="">Kayu Terembesi</option>
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
              value="{{ $data_brg->harga}}">
              @error('harga') 
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
  
            <div class="form-group">
              <label class="form-label">Stok</label>
              <input type="text" name="stok" class="form-control @error ('stok') is-invalid @enderror"
              value="{{ $data_brg->stok}}">
              @error('stok') 
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
            </div>
  
            <div class="form-group">
              <label class="form-label">Gambar Produk</label><br>
              <input type="file" name="foto" class="form-control">
            </div>
  
        </div>
  
        <div class="modal-footer">
          <a href="{{url('/databarang' )}}" class="btn btn-danger" data-dismiss="modal"><i class="far fa-hand-point-left"></i> Kembali</a>
          <button type="submit" class="btn btn-primary"><i class="fas fa-user-edit"></i> Edit</button>
        </div>
  
        </form>
          <!-- from edit -->

                  </div>
              </div>
      </div>
  </main>

@endsection
@section('footer')
    

    