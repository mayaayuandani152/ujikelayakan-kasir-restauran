@extends('layouts.user_layout.html')
@include('layouts.user_layout.user_header')

@section('link')
@section('html')

<div class="container mt-5">
    
    <div class="row">
        
        <div class="col-md-12 mt-1">
            
            <div class="card">
                <div class="card-body">
                <h2><i class=" fa fa-shopping-cart"></i> Keranjang</h2>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama Masakan</th>
                                <th>Keterangan</th>
                                <th>Harga</th>
                                <th>Total Bayar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                        <?php $no = 1; ?>
                        @if(!empty($order))
                        @foreach($order_detail as $pesanan_detail)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td><img width="70px" src="{{ url('/data_file/'.$pesanan_detail->masakan->foto) }}" class=""></td>
                                <!-- ngambil dari relasi -->
                                <td>{{ $pesanan_detail->masakan->nama_masakan }}</td>
                                <td>{{ $pesanan_detail->jumlah }}</td>
                                <td>Rp. {{ number_format($pesanan_detail->masakan->harga) }}</td>
                                <td>Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                                <td>
                                    <form action="/checkout/{{$pesanan_detail->id}}" method="post">
                                        @csrf
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash" onclick="return confirm('Anda yakin ingin menghapus Data?');"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        
                        <tr>
                            <td >
                                <a href="{{route('shop.index') }}" class="btn btn-danger"><i class="fas fa-angle-left"></i> Lanjut Belanja</a>
                            </td>
                            <td colspan="4" align="right"><strong>Total Harga: </strong></td>
                            <td><strong> RP. {{ number_format($order->jumlah_harga) }}</strong></td>
                            <td>
                                <a href="/checkout/konfirmasi" class="btn btn-success"><i class="fa fa-shopping-cart"></i>Check Out</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection