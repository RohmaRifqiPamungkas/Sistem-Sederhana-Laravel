@extends('layouts.app')
@section('title', 'Daftar Seri Buku')

@section('content')
    <h2>Daftar Seri Buku</h2>
    <div class="send_bt">
        <a href="{{ url('seri_buku/create') }}">Tambah</a>
    </div>
    <table>
        <tr>
            <th>No.</th>
            <th>ID</th>
            <th>Nama Seri</th>
            <th>Lokasi</th>
            <th>Keterangan</th>
            <th>Aksi</th>
        </tr>
        @php
            $i = 1;
        @endphp
        @foreach ($seri as $s)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $s->id }}</td>
                <td>{{ $s->nama }}</td>
                <td>{{ $s->lokasi }}</td>
                <td>{{ $s->keterangan }}</td>
                <td>
                    <a href="seri_buku/{{ $s->id }}/edit">Edit</a>
                    <a href="seri_buku/{{ $s->id }}">Hapus</a>
                </td>
            </tr>
            @php
                $i++;
            @endphp
        @endforeach
    </table>
@endsection
