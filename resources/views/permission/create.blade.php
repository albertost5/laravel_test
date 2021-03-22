@extends('layouts.app')

@section('title', '- Create Permission')


@section('content')
    <div class="container">
        <h3 class="text-center">CREATE PERMISSION</h3>

        @include('partials.success')

        <form action="{{ route('permissions.store') }}" method="POST" name="f-permission-create">
            @include('permission.form._f-permission')
        </form>
    </div>
@endsection

    
