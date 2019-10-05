
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9 ">
            <div class="card">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card-header">Add New MataKuliah</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('matkul.store') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="kd_matkul" class="col-md-4 col-form-label text-md-right">Kode Matkul</label>

                            <div class="col-md-6">
                                <input id="kd_matkul" type="text" class="form-control{{ $errors->has('kd_matkul') ? ' is-invalid' : '' }}" name="kd_matkul" value="{{ $kd }}" required readonly>

                                @if ($errors->has('kd_matkul'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kd_matkul') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama_matkul" class="col-md-4 col-form-label text-md-right">Nama Matkul</label>

                            <div class="col-md-6">
                                <input id="nama_matkul" type="text" class="form-control{{ $errors->has('nama_matkul') ? ' is-invalid' : '' }}" name="nama_matkul" value="{{ old('nama_matkul') }}" required autofocus>

                                @if ($errors->has('nama_matkul'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('nama_matkul') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('ADD') }}
                                </button>
                                <a href="{{ route('matkul.index') }}" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
