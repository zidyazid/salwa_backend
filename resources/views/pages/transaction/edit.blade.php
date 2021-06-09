@extends('layout.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Ubah Barang</strong>
            <small>{{ $old_product->uuid }}</small>
        </div>
        <div class="card-body card-block">
            <form action="{{ route('transactions.update', $old_product->id) }}" method="post">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Pemesan</label>
                    <input type="text" 
                           id="name" 
                           name="name" 
                           value="{{ old('name') ? old('name') : $old_product->name }}" class="form-control @error('name') is-invalid @enderror">
                    @error('name') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="email" class="form-control-label">Tipe Barang</label>
                    <input type="text" 
                           id="email" 
                           name="email" 
                           value="{{ old('email') ? old('email') : $old_product->email }}" 
                           class="form-control @error('email') is-invalid @enderror">
                    @error('email') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

               
                <div class="form-group">
                    <label for="number" class="form-control-label">Nomor Hp</label>
                    <input type="text" 
                           id="number" 
                           name="number" 
                           value="{{ old('number') ? old('number') : $old_product->number }}" 
                           class="form-control @error('number') is-invalid @enderror">
                    @error('number') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="address" class="form-control-label">Alamat Pemesan</label>
                    <input type="text" 
                           id="address" 
                           name="address" 
                           value="{{ old('address') ? old('address') : $old_product->address }}" 
                           class="form-control @error('address') is-invalid @enderror">
                    @error('address') <div class="text-muted">{{ $message }}</div> @enderror
                </div>

                <div class="form-group btn-success btn-block">
                    <button type="submit" class="btn btn-success btn-block">
                        Ubah Transaksi
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection