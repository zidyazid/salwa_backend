@extends('layout.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Edit Barang</strong>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('products.update', $old_product->id) }}" method="post">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Barang</label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           value="{{ old('name') ? old('name') : $old_product->name }}" class="form-control @error('name') is-invalid @enderror">
                    @error('name') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="type" class="form-control-label">Tipe Barang</label>
                    <input type="text" 
                           id="type" 
                           name="type" 
                           value="{{ old('type') ? old('type') : $old_product->type }}" 
                           class="form-control @error('type') is-invalid @enderror">
                    @error('type') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="form-control-label">Deskripsi Barang</label>
                    <textarea name="description" 
                              id="description" 
                              class="form-control ckeditor @error('description') is-invalid @enderror">
                              {{ old('description') ? old('description') : $old_product->description }}
                    </textarea>
                    @error('description') <div class="text-muted">{{ $message }}</div> @enderror
                </div>
               
                <div class="form-group">
                    <label for="price" class="form-control-label">Harga</label>
                    <input type="number" 
                           id="price" 
                           name="price" 
                           value="{{ old('price') ? old('price') : $old_product->price }}" 
                           class="form-control @error('price') is-invalid @enderror">
                    @error('price') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="quantity" class="form-control-label">Stok Barang</label>
                    <input type="number" 
                           id="quantity" 
                           name="quantity" 
                           value="{{ old('quantity') ? old('quantity') : $old_product->quantity }}" 
                           class="form-control @error('quantity') is-invalid @enderror">
                    @error('quantity') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group btn-success btn-block">
                    <button type="submit" class="btn btn-success btn-block">
                        Ubah Data
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection