@extends('new.layouts.main-layout')
@section('content')
    <section id="new_post">
        <h2>Create new Post</h2>
        <form action="{{route('store')}}" id="user-post" method="POST">
            @method('POST')
            @csrf
            {{-- create - category --}}
            <div class="select-option">
                <select name="categories" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category -> id }}">{{ $category -> name }}</option>
                    @endforeach
                </select>
            </div>

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
                <label for="subtitle" class="col-md-4 col-form-label text-md-right">{{ __('Subtitle') }}</label>
                <div class="col-md-6">
                    <input id="subtitle" max="60" type="text" class="form-control @error('subtitle') is-invalid @enderror" name="subtitle">
                    @error('subtitle')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- create - text --}}
            <div class="form-group row">
                <label for="content" class="col-md-4 col-form-label text-md-right">{{ __('Content') }}</label>
                <div class="col-md-6">
                    <textarea id="content" maxlength="200" rows="5" class="form-control @error('content') is-invalid @enderror" name="content"></textarea>
                    @error('text')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            {{-- create - tag --}}
            <div class="tag-options">
                <p>Scegli uno o pi&ugrave; tag&colon; </p>
                @foreach ($tags as $tag)
                    <input type="checkbox" name="tags[]" value="{{$tag -> id}}"> {{$tag -> tag_name}}
                @endforeach
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
