@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Add Sub Category') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{route('store_sub_category')}}">
                        @csrf

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Sub Category') }}</label>

                            <div class="col-md-6">
                                <input id="sub_name" type="text" class="form-control @error('sub_name') is-invalid @enderror" name="sub_name" value="{{ old('sub_name') }}" required autocomplete="sub_name" autofocus>

                                @error('sub_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        

                        <div class="row mb-3">
                            <label for="main_category" class="col-md-4 col-form-label text-md-end">{{ __('Main Category') }}</label>

                            <div class="col-md-6">
                                <select id="main_category"  name="main_category" class="form-control">
                                <option value="">choose</option>
                                    @foreach ($maincategory as $c) 
                                   <option value="<?=$c->id;?>"> {{$c->name}}</option>
                                
                                   @endforeach
                                    
                                
                                
                                </select>                           
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
