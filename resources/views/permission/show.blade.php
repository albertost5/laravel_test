@extends('layouts.app')

@section('title', 'Permision ' . $p->id)


@section('content')
    <div class="container">
        <h3 class="text-center mt-5">PERMISSION Nº {{ $p->id }}</h3>

        @csrf

        <div class="form-grop">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ $p->name }}" readonly>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
                <br />
            @enderror
        </div>
    </div>
@endsection
