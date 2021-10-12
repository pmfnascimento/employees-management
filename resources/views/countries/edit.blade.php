@extends('layouts.main')


@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Countries</h1>
    </div>

    <div class="card">
        <div class="card-header">
            Edit Country
            <a href="{{ route('countries.index') }}" class="btn btn-info float-right">Back</a>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('countries.update', $country->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="country_code" class="col-md-4 col-form-label text-md-right">{{ __('Code') }}</label>

                    <div class="col-md-6">
                        <input id="country_code" type="text" class="form-control @error('country_code') is-invalid @enderror"
                            name="country_code" value="{{ old('country_code', $country->country_code) }}"
                            autocomplete="country_code" autofocus>

                        @error('country_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                            value="{{ old('name', $country->name) }}" autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-6 col-sm-6 col-md-3 offset-4 text-right">
                        <button type="submit" class="btn btn-info btn-block">
                            {{ __('Update Country') }}
                        </button>
                    </div>

            </form>

            <div class="col-6 col-sm-6 col-md-3 text-right">
                <form method="POST" action="{{ route('countries.destroy', $country->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-primary btn-block" type="submit">Delete
                        {{ $country->name }}</button>
                </form>
            </div>
        </div>
        </div>
    </div>

@endsection
