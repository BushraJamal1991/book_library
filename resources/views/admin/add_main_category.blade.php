@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Main Category') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('store_main_category')}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Main Category') }}</label>

                            <div class="col-md-6">
                                <input id="main_category" type="text" class="form-control @error('main_category') is-invalid @enderror" name="main_category" value="{{ old('main_category') }}" required autocomplete="main_category" autofocus>

                                @error('main_category')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Add') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
