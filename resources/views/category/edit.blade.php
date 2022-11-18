@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-6 form-div mar-0">
                <form action="{{route('model_edit', $model)}}" method="model" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                <h3 class="heading">Edit model: {{$model->title}}</h3>
                <div class="mb-3">
                    <span class="input-group-text">Title</span>
                    <input value="{{ old('title', $model->title) }}" type="text" class="form-control" name="title">
                </div>
                <div class="mb-3">
                    <span class="input-group-text">Price</span>
                    <input value="{{ old('price', $model->price) }}" type="number" step="0.01" class="form-control" name="price">
                </div>
                <div class="mb-3">
                    <span class="input-group-text">Add photo</span>
                    <input type="file" class="form-control" name="photo[]" multiple>
                </div>
                <div class="img-small-ch mt-3">
                    @forelse($model->getPhotos as $photo)
                        <div class="image">
                            <label for="{{ $photo->id }}-del-photo">
                                X
                            </label>
                            <input type="checkbox" value="{{ $photo->id }}"
                                id="{{ $photo->id }}-del-photo" name="delete_photo[]">
                            <img src="{{ $photo->url }}" alt="photo">
                        </div>
                    @empty
                        <div class="img-small-ch mt-3">
                            <h5>No images</h5>
                        </div>
                    @endforelse
                <div class="mb-3">
                    <span class="input-group-text">Comment</span>
                    <textarea class="form-control" name="comment">{{ old('comment', $model->comment) }}</textarea>
                </div>
                <button type="submit" class="btn btn-secondary mt-4 mb-2 ml-2" @if (Auth::user()->role < 10) style="opacity: 0.3" disabled @endif>Save changes</button>
                </form>
            </div>
        </div>
    </div>
@endsection
