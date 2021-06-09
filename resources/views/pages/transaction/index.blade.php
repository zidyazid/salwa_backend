@extends('layout.default')

@section('content')
    
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="box-title">Daftar Transaksi Masuk</h4>
                        {{-- <div class="card-body"> --}}
                            <div class="table-stats order-table ov-h">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Email</th>
                                            <th>Nomor</th>
                                            <th>Total Transaksi</th>
                                            <th>Status Transaksi</th>
                                            <th>Ubah Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($items as $i)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $i->name }}</td>
                                            <td>{{ $i->email }}</td>
                                            <td>{{ $i->number }}</td>
                                            <td>Rp.{{ $i->transaction_total }}</td>
                                            <td>

                                                @if ($i->transaction_status == 'PENDING')
                                                        <span class="badge badge-info">
                                                    @elseif ($i->transaction_status == 'SUCCESS')
                                                        <span class="badge badge-success">
                                                    @elseif ($i->transaction_status == 'FAILED')
                                                        <span class="badge badge-danger">
                                                    @else                                                        
                                                        <span>
                                                @endif

                                                {{ $i->transaction_status }}

                                            </span>    
                                            </td>
                                            <td>
                                                @if ($i->transaction_status == 'PENDING')

                                                <a href="{{ route('transactions.status', $i->id) }}?status=SUCCESS" class="btn btn-success btn-sm">
                                                    <i class="fa fa-check"></i>
                                                </a>
                                                <a href="{{ route('transactions.status', $i->id) }}?status=FAILED" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-times"></i>
                                                </a>
                                                    </a>
                                                    {{-- <a href="{{ route('transactions.status', $i->id) }}?status='FAILED'" 
                                                        class="btn btn-danger btn-sm">
                                                        <i class="fa fa-times"></i>
                                                
                                                    </a>
                                                     --}}
                                                @endif

                                                <a href="#mymodal"
                                                   data-remote="{{ route('transactions.show', $i->id) }}"
                                                   data-toggle="modal"
                                                   data-target="#mymodal"
                                                   data-title="Detail Transaksi {{ $i->uuid }}"
                                                   class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                </a>

                                            </td>
                                            <td>
                                                {{-- <a href="{{ route('transactions.show', $i->id)}}" class="btn btn-info btn-sm">
                                                    <i class="fa fa-eye"></i>
                                                </a> --}}
                                                <a href="{{ route('transactions.edit', $i->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-pencil"></i>
                                                </a>
    
                                                <form action="{{ route('transactions.destroy', $i->id) }}" method="post" class="d-inline">
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