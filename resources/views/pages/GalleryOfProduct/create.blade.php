@extends('layout.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Foto Barang</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('products-galleries.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Barang</label>
                    <select name="products_id"
                            class="form-control @error('products_id') is-invalid @enderror">
                            @foreach ($product as $product)
                                <option value="{{ $product->id }}">{{ $product->name }}</option>
                            @endforeach
                    </select>
                    @error('products_id') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
                
                <div class="form-group">
                    <label for="photo" class="form-control-label">Foto Barang</label>
                    <input type="file" 
                           id="photo" 
                           name="photo" 
                           value="{{ old('photo') }}" 
                           accept="image/*"
                           class="form-control @error('photo') is-invalid @enderror">
                    @error('photo') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="is_default" class="form-control-label">Jadikan Default</label>
                    <br>
                    <label>
                        <input type="radio" 
                               name="is_default" 
                               value="1" 
                               class="form-control @error('is_default') is-invalid @enderror">Ya
                    </label>
                    @error('is_default') <div class="text-muted">{{ $message }}</div> @enderror
                    &nbsp;
                    <label>
                        <input type="radio" 
                               name="is_default" 
                               value="0" 
                               class="form-control @error('is_default') is-invalid @enderror">No
                    </label>
                    @error('is_default') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group btn-primary btn-block">
                    <button type="submit" class="btn btn-primary btn-block">
                        Tambah Foto Barang
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection