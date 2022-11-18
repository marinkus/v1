@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 form-div mar-0">
                <form action="{{ route('model_store') }}" method="model" enctype="multipart/form-data">
                    @csrf
                    <h3 class="heading">CREATE</h3>
                    <div class="mb-3">
                        <span class="input-group-text">Title</span>
                        <input value="{{ old('title') }}" type="text" class="form-control" name="title">
                    </div>
                    <div class="mb-3">
                        <span class="input-group-text">Price</span>
                        <input value="{{ old('price') }}" type="number" step="0.01" class="form-control"
                            name="price">
                    </div>
                    <div class="mb-3">
                        <span class="input-group-text">Add photo</span>
                        <input type="file" class="form-control" name="photo[]" multiple>
                    </div>
                    <div class="mb-3">
                        <span class="input-group-text">Comment</span>
                        <textarea class="form-control" name="comment">{{ old('comment') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary mt-4"
                        @if (Auth::user()->role < 10) style="opacity: 0.3" disabled @endif>Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
