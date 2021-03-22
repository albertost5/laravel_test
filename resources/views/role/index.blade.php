@extends('layouts.app')

@section('title', '- Index')


@section('content')
    <div class="container">
        <h3 class="text-center">ROLES INDEX</h3>

        @include('partials.success')

        <a href="{{ route('roles.create') }}" class="btn btn-success btn-sm">New Role</a>

        <table class="table table-dark mt-5">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Created at</th>
                    <th scope="col">Updated at</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($roles as $r)
                    <tr>
                        <td></td>
                        <td>{{ $r->id }}</td>
                        <td>{{ $r->name }}</td>

                        <td>{{ $r->created_at->format('d-m-Y') }}</td>
                        <td>{{ date('d-m-Y', strtotime($r->updated_at)) }}</td>
                        <td>
                            <a href="{{ route('roles.show', $r->id) }}" class="btn btn-primary btn-sm">Show</a>
                            <a href="{{ route('roles.edit', $r) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a class="btn btn-danger btn-sm" href="{{ route('roles.destroy', $r) }}" onclick="event.preventDefault();
                                                                     document.getElementById('f-role-delete').submit();">
                                {{ __('Borrar') }}
                            </a>
                            <form action="{{ route('roles.destroy', $r) }}" method="POST" name="f-role-delete" id="f-role-delete"
                                class="d-none">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{ $roles->links() }}
    </div>
@endsection
