@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5.5">
            <div class="card">
            <div class="card-header"><a href="{{{ route('matkul.create') }}}" class="btn btn-outline-primary">ADD</a> List MataKuliah </div>
                <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="btn btn-outline-success">Refresh</a>

                <div class="card-body">
                    <table align="center" class="table table-responsive">
                        <tr>
                            <th>Nomor</th>
                            <th>Kode Matkul</th>
                            <th>Nama Matkul</th>
                            <th>Aksi</th>
                            <th></th>
                        </tr>

                        @php
                            $no=1;
                        @endphp
                        @foreach ($matkul as $matkul)

                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$matkul->kd_matkul}}</td>
                                <td>{{$matkul->nama_matkul}}</td>
                                <td>
                                    <a href="{{ route('matkul.edit',$matkul->kd_matkul) }}" class="btn btn-outline-warning">Edit</a>
                                </td>
                                <td>
                                        <form action="{{ route('matkul.destroy', $matkul->kd_matkul )}}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger" type="submit" onclick="return confirm('Apakah Anda Ingin Menghapus Data Ini');">Delete</button>
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
