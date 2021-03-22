@extends('layouts.app')

@section('title', '- Index')


@section('content')
    <div class="container">
        <h3 class="text-center">PERMISSIONS INDEX</h3>

        @include('partials.success')

        <a href="{{ route('permissions.create') }}" class="btn btn-success btn-sm">New Permission</a>

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
                @foreach ($permissions as $p)
                    <tr>
                        <td></td>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->name }}</td>

                        <td>{{ $p->created_at->format('d-m-Y') }}</td>
                        <td>{{ date('d-m-Y', strtotime($p->updated_at)) }}</td>
                        <td>
                            <a href="{{ route('permissions.show', $p->id) }}" class="btn btn-primary btn-sm">Show</a>
                            <a href="{{ route('permissions.edit', $p) }}" class="btn btn-warning btn-sm">Edit</a>
                            <a class="btn btn-danger btn-sm" href="#" onclick="event.preventDefault();
                                                                     document.getElementById('fpermission-delete').submit();">
                                {{ __('Borrar') }}
                            </a>
                            <form action="{{ route('permissions.destroy', $p->id) }}" method="POST" name="fpermission-delete" id="fpermission-delete"
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

        {{ $permissions->links() }}
    </div>
@endsection
