@extends('layouts.app')

@section('title', 'Editar Permission ' . $p->id)


@section('content')
    <div class="container">
        <h3 class="text-center mt-5">EDITAR PERMISSION Nº {{ $p->id }}</h3>

        @include('partials.success')

        <form action="{{ route('permissions.update', $p->id) }}" method="POST" name="f-permission-update">
            @method('PUT')
            @include('permission.form._f-permission')
        </form>
    </div>

@endsection
