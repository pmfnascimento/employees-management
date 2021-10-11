@extends('layouts.main')


@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Users</h1>
</div>
<div>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
</div>
<div class="card">

    <div class="card-header">
        <a href="{{ route('users.create') }}" class="float-right btn btn-info">Create</a>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
              <tr>
                <th scope="col">#ID</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Manager</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{ $user->id }}</th>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info col-md-8">Edit</a>
                    </td>
                  </tr>
                @endforeach

            </tbody>
          </table>

    </div>
</div>
@endsection


