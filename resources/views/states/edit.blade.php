@extends('layouts.main')


@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">States</h1>
    </div>

    <div class="card">
        <div class="card-header">
            Create new State
            <a href="{{ route('states.index') }}" class="btn btn-info float-right">Back</a>
        </div>
        <div class="card-body">

            <form method="POST" action="{{ route('states.update', $state->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group row">
                    <label for="country_code"
                        class="col-md-4 col-form-label text-md-right">{{ __('Country Code') }}</label>
                    <div class="col-md-6">
                        <select class="form-control @error('country_code') is-invalid @enderror" id="country_code"
                            name="country_code" autocomplete="country_code" autofocus>

                            @foreach ($countries as $country)
                                @if ($country->id == $state->country->id)
                                    <option value="{{ $state->country_id }}" selected>{{ $state->country->name }}
                                    </option>
                                @else
                                    <option value="{{ $country->id }}" @if (old('country_code') == $country->id) selected="selected" @endif>{{ $country->name }}
                                    </option>
                                @endif
                            @endforeach
                        </select>
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
                            value="{{ old('name', $state->name) }}" autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mb-0">

                    <div class="col-6 col-sm-6 col-md-3 offset-md-4 text-right">
                        <button type="submit" class="btn btn-info btn-block">
                            {{ __('Update State') }}
                        </button>
                    </div>

            </form>
            <div class="col-6 col-sm-6 col-md-3 text-right">
                <form method="POST" action="{{ route('states.destroy', $state->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-primary btn-block" type="submit">Delete
                        {{ $state->name }}</button>
                </form>
            </div>
        </div>
        </div>
    </div>
@endsection
