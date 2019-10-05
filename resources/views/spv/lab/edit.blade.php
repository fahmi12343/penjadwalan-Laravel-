
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
                <div class="card-header">Add New Lab</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('lab.update',$lab->id) }}">
                        @csrf
                        @method('PUT')


                        <div class="form-group row">
                            <label for="nama_lab" class="col-md-4 col-form-label text-md-right">Nama Lab</label>

                            <div class="col-md-6">
                                <input id="nama_lab" type="text" value="{{ $lab->nama_lab }}" class="form-control{{ $errors->has('nama_lab') ? ' is-invalid' : '' }}" name="nama_lab" value="{{ old('nama_lab') }}" readonly>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="desk_lab" class="col-md-4 col-form-label text-md-right">Deskripsi Lab</label></label>

                            <div class="col-md-6">
                                <input id="desk_lab" type="text" value="{{ $lab->desk_lab }}" class="form-control{{ $errors->has('desk_lab') ? ' is-invalid' : '' }}" name="desk_lab" value="{{ old('desk_lab') }}" required autofocus>
                            </div>
                        </div>

                         <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                                <a href="{{ route('lab.index') }}" class="btn btn-danger">Back</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
