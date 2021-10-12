@extends('layouts.main')


@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cities</h1>
</div>

<div class="card">
    <div class="card-header">
        Create new City
        <a href="{{ route('cities.index') }}" class="btn btn-info float-right">Back</a>
    </div>
    <div class="card-body">

        <form method="POST" action="{{ route('cities.store') }}">
            @csrf
            <div class="form-group row">
                <label for="state_code" class="col-md-4 col-form-label text-md-right">{{ __('Country Code') }}</label>
                <div class="col-md-6">
                    <select class="form-control @error('state_code') is-invalid @enderror" id="state_code" name="state_code" autocomplete="state_code" autofocus>
                        <option value="">Select an Country</option>
                        @foreach ($states as $state)
                            <option value="{{ $state->id }}" @if (old('state_code') == $state->id) selected="selected" @endif>{{ $state->name }}</option>
                        @endforeach
                    </select>
                    @error('state_code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

            </div>

            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-info float-right">
                        {{ __('Create new City') }}
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection


