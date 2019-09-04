@extends('layouts.app')

@section('content')
	<div class="container">
    <div class="card">
      <img class="card-img-top" src="" alt="">
      <h4 class="card-title text-center text-white bg-primary p-3 m-0"><u>BUAT PRODUK</u></h4>
      <div class="card-body">
        <a href="/dashboard">&laquo; Ke daftar Produk</a>

        <form method="POST" action="{{ route('product.create') }}" enctype="multipart/form-data">
          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
          @csrf

          <div class="form-group row">
            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Judul') }}</label>

            <div class="col-md-6">
              <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title') }}" required autofocus placeholder="Judul...">

              @error('title')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          
          <div class="form-group row">
            <label for="category" class="col-md-4 col-form-label text-md-right">{{ __('Kategori') }}</label>

            <div class="col-md-6">
              <select class="form-control" id="category" name="category_id">
                @foreach ($category::all() as $cat)
                  <option value="{{$cat->id}}" class="text-capitalize">{{$cat->category_name}}</option>
                @endforeach
              </select>

              @error('category')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>

          <div class="form-group row">
            <label for="price" class="col-md-4 col-form-label text-md-right">{{ __('Harga / satuan') }}</label>

            <div class="col-7 col-md-4">
              <input id="price" type="text" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required placeholder="0">

              @error('price')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="col-5 col-md-2">
              <select class="form-control" id="unit" name="unit">
                <option value="gr">gr (gram)</option>
                <option value="kg">kg (kilogram)</option></option>
                <option value="pcs">pcs</option>
              </select>
            </div>
          </div>

          <div class="form-group row">
              <label for="stock" class="col-md-4 col-form-label text-md-right">{{ __('Stok') }}</label>

              <div class="col-md-6">
                <input id="stock" type="text" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock') }}" required placeholder="0">

                @error('stock')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
          </div>

          <div class="form-group row">
            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('Deskripsi') }}</label>
            <div class="col-md-6">
              <textarea name="description" class="form-control" id="description" rows="5" placeholder="..." required></textarea>
            </div>
          </div>

          <div class="form-group row">
            <label for="filename" class="col-md-4 col-form-label text-md-right">{{ __('Gambar Produk') }}</label>
            <div class="col-md-6">
              <input name="filename" id="filename" type="file" required>
            </div>
          </div>

          <div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-success">
                      {{ __('Simpan') }}
                  </button>
              </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
