@extends('layouts.main')


@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">States</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div>
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
            </div>
            <div class="card">

                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <form method="GET" accept="{{ route('states.index') }}">
                                <div class="form-row align-items-center">
                                    <div class="col">
                                        <input type="search" name="search" class="form-control" id="search"
                                            placeholder="Search">
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-info">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div>
                            <a href="{{ route('states.create') }}" class="btn btn-info">Create</a>
                        </div>

                        </div>

                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Country Code</th>
                                <th scope="col">State Name</th>
                                <th scope="col">Manager</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($states as $state)
                                <tr>
                                    <th scope="row">{{ $state->id }}</th>
                                    <td>{{ $state->country->country_code }}</td>
                                    <td>{{ $state->name }}</td>
                                    <td>
                                        <a href="{{ route('states.edit', $state->id) }}"
                                            class="btn btn-info col-md-8">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
