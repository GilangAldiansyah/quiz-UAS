@extends('layouts.app')

@section('body')
    <h1>Produk Stok Tersedia</h1>
    <table class="table table-bordered">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            @if($inStockProducts->count() > 0)
                @foreach($inStockProducts as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->nama_produk }}</td>
                        <td class="align-middle">{{ $rs->harga }}</td>
                        <td class="align-middle">{{ $rs->stok }}</td>
                    </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="text-center" colspan="5">Produk kosong</td>
                    </tr>
                @endif
            </tbody>
        </table>

@endsection
