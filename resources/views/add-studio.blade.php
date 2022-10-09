@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    
                    <div class="row mb-0">
                        <div class="col-md-10 ">{{ __('Dashboard') }}</div>
                        <div class="col-md-2 p-0 text-end" >
                            <a href = "{{route('studio')}}"  class="btn btn-primary">
                                {{ __('Back') }}
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('save',['id'=>isset($studio->id)?$studio->id:'']) }}"  enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="studio_name" class="col-md-4 col-form-label text-md-end">{{ __('Studio Name') }}</label>

                            <div class="col-md-6">
                                <input id="studio_name" type="text" class="form-control @error('studio_name') is-invalid @enderror" name="studio_name" value="{{ old('studio_name',isset($studio->studio_name)?$studio->studio_name:'') }}"  autocomplete="studio_name" autofocus>

                                @error('studio_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>
                            <div class="col-md-6">
                                <textarea id="description" type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}"  autocomplete="description" autofocus>{{isset($studio->description)?$studio->description:''}}</textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="location" class="col-md-4 col-form-label text-md-end">{{ __('Location') }}</label>
                            <div class="col-md-6">
                                <textarea id="location" type="text" class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}"  autocomplete="location" autofocus>{{isset($studio->location)?$studio->location:''}}</textarea>
                                @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="opening_time" class="col-md-4 col-form-label text-md-end">{{ __('Opening Time') }}</label>
                            <div class="col-md-6">
                                <input id="opening_time" type="time" class="form-control @error('opening_time') is-invalid @enderror" name="opening_time" value="{{ old('opening_time',isset($studio->opening_time)?Carbon\Carbon::parse($studio->opening_time)->format('H:i'):'') }}"  autocomplete="opening_time">
                                @error('opening_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="closing_time" class="col-md-4 col-form-label text-md-end">{{ __('Closing Time') }}</label>
                            <div class="col-md-6">
                                <input id="closing_time" type="time" class="form-control @error('closing_time') is-invalid @enderror" name="closing_time" value="{{ old('closing_time',isset($studio->closing_time)?(Carbon\Carbon::parse($studio->closing_time)->format('H:i')):'') }}"  autocomplete="closing_time">
                                @error('closing_time')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="charges" class="col-md-4 col-form-label text-md-end">{{ __('Hourly Rate') }}</label>
                            <div class="col-md-6">
                                <input id="charges" type="number" class="form-control @error('charges') is-invalid @enderror" name="charges" value="{{ old('charges',isset($studio->charges)?$studio->charges:'') }}"  autocomplete="charges">
                                @error('charges')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="studio_image" class="col-md-4 col-form-label text-md-end">{{ __('Studio Image') }}</label>
                            <div class="col-md-6">
                                <input id="studio_image" type="file" class="form-control @error('studio_image') is-invalid @enderror" name="studio_image" >
                                @error('studio_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
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
