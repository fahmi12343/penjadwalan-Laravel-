@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5.5">
            <div class="card">
            <div class="card-header"><a href="{{{ route('lab.create') }}}" class="btn btn-outline-primary">ADD</a> List Lab </div>
                <a href="<?php echo $_SERVER['PHP_SELF']; ?>" class="btn btn-outline-success">Refresh</a>

                <div class="card-body">
                    <table align="center" class="table table-responsive">
                        <tr>
                            <th>Nomor</th>
                            <th>Nama Lab</th>
                            <th>Deskripsi Lab</th>
                            <th>Aksi</th>
                            <th></th>
                        </tr>

                        @php
                            $no=1;
                        @endphp
                        @foreach ($lab as $lab)

                            <tr>
                                <td>{{$no}}</td>
                                <td>{{$lab->nama_lab}}</td>
                                <td>{{$lab->desk_lab}}</td>
                                <td>
                                    <a href="{{ route('lab.edit',$lab->id) }}" class="btn btn-outline-warning">Edit</a>
                                </td>
                                <td>
                                        <form action="{{ route('lab.destroy', $lab->id )}}" method="POST">
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
