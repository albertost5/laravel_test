@extends('layouts.app')

@section('title', '- Create Role')


@section('content')
    <div class="container">
        <h3 class="text-center">CREATE ROLE</h3>

        @include('partials.success')

        <form action="{{ route('roles.store') }}" method="POST" name="f-role-create">
            @include('role.form._f-role')
        </form>
    </div>
@endsection

    
