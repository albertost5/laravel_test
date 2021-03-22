@extends('layouts.app')

@section('title', 'Role ' . $r->id)


@section('content')
    <div class="container">
        <h3 class="text-center mt-5">ROLE Nº {{ $r->id }}</h3>

        @csrf

        <div class="form-grop">
            <label for="name">Name</label>
            <input class="form-control" type="text" name="name" id="name" value="{{ $r->name }}" readonly>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
                <br />
            @enderror
        </div>
    </div>
@endsection
