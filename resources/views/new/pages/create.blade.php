@extends('new.layouts.main-layout')
@section('content')
    <section id="new_post">
        <h2>Create new Post</h2>
        <form action="{{route('store')}}" id="user-post" method="POST">
            @method('POST')
            @csrf
            {{-- create - title --}}
            <div class="form-group row">
                <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Title') }}</label>
                <div class="col-md-6">
                    <input id="title" max="60" type="title" class="form-control @error('title') is-invalid @enderror" name="title" required>
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            {{-- create - subtitle --}}
            <div class="form-group row">
                <label for="subtitle" class="col-md-4 col-form-label text-md-right">{{ __('subtitle') }}</label>
                <div class="col-md-6">
                    <input id="subtitle" max="60" type="subtitle" class="form-control @error('subtitle') is-invalid @enderror" name="subtitle">
                    @error('subtitle')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            {{-- create - text --}}
            <div class="form-group row">
                <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('content') }}</label>
                <div class="col-md-6">
                    <input id="text" type="textarea" max="200" class="form-control @error('content') is-invalid @enderror" name="content">
                    @error('text')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            {{-- create - submit button --}}
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button form="user-post" type="submit" class="btn btn-primary">
                        {{ __('Create') }}
                    </button>
                </div>
            </div>
        </form>
    </section>
@endsection
