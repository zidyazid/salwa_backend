@extends('layout.default')

@section('content')
    
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Foto Barang <small>{{ $product->name }}</small></h4>
                        {{-- <div class="card-body"> --}}
                            <div class="table-stats order-table ov-h">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>#</th>
                                            <th>Nama Barang</th>
                                            <th>Foto</th>
                                            <th>Default</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($item as $i)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $i->id }}</td>
                                            <td>{{ $i->product->name }}</td>
                                            <td>
                                                <img src="{{ url('storage/'. $i->photo) }}" alt="">
                                            </td>
                                            <td>{{ $i->is_default ? 'ya' : 'tidak' }}</td>
                                            <td>
                                                <form action="{{ route('products-galleries.destroy', $i->id) }}" method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>      
                                        
                                        @empty
                                            
                                            <tr>
                                                <td>Data Tidak Ditemukan</td>
                                            </tr>
                                        
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        {{-- </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection