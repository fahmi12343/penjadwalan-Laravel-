@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
            <div class="card-header"><a href="{{{ route('dosen.create') }}}" class="btn btn-outline-primary">ADD</a> List Dosen </div>
                <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="btn btn-outline-success">Refresh</a>

                <div class="card-body">
                    <table align="center" class="table table-responsive">
                        <tr>
                            <th>Nomor</th>
                            <th>Nip</th>
                            <th>Nama</th>
                            <th>Telepol</th>
                            <th>E-Mail</th>
                            <th>Aksi</th>
                            <th></th>
                        </tr>

                        @php
                            $no=1;
                        @endphp
                        @foreach ($dosen as $dosen)

                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$dosen->nip}}</td>
                                <td>{{$dosen->nama}}</td>
                                <td>{{$dosen->telp}}</td>
                                <td>{{$dosen->email}}</td>
                                <td>
                                    <a href="{{ route('dosen.edit',$dosen->id) }}" class="btn btn-outline-warning">Edit</a>
                                </td>
                                <td>
                                        <form action="{{ route('dosen.destroy', $dosen->id )}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                        <button class="btn btn-outline-danger" type="submit"  onclick="return confirm('Apakah Anda Ingin Menghapus Data Dosen {{$dosen->nama}}');">Delete</button>
                                        </form>
                                </td>
                            </tr>

                        @php
                            $no++
                        @endphp
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
