@extends('layouts.app')

@section('title', 'Editar Role ' . $r->id)


@section('content')
    <div class="container">
        <h3 class="text-center mt-5">EDITAR ROLE Nº {{ $r->id }}</h3>

        @include('partials.success')

        <form action="{{ route('roles.update', $r->id) }}" method="POST" name="f-role-update">
            @method('PUT')
            @include('role.form._f-role')
        </form>
    </div>

@endsection
