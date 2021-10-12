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

        <form method="POST" action="{{ route('states.store') }}">
            @csrf
            <div class="form-group row">
                <label for="country_code" class="col-md-4 col-form-label text-md-right">{{ __('Country Code') }}</label>
                <div class="col-md-6">
                    <select class="form-control @error('country_code') is-invalid @enderror" id="country_code" name="country_code" autocomplete="country_code" autofocus>
                        <option value="">Select an Country</option>
                        @foreach ($countries as $country)
                            <option value="{{ $country->id }}" @if (old('country_code') == $country->id) selected="selected" @endif>{{ $country->name }}</option>
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
                        {{ __('Create new Sate') }}
                    </button>
                </div>
            </div>
        </form>

    </div>
</div>
@endsection


