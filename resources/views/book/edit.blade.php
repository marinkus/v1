@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 form-div mt-2">
                <h2>Edit Book</h2>
            <div class="card-body">
                <form action="{{ route('b_store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text">Title</span>
                        <input value="{{ old('title', $book->title) }}" type="text" class="form-control" name="title">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">ISBN</span>
                        <input value="{{ old('isbn', $book->isbn) }}" type="text" class="form-control" name="isbn">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Pages count</span>
                        <input value="{{ old('pages', $book->pages) }}" type="number" class="form-control" name="pages">
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Description</span>
                        <textarea name="description" cols="30" rows="10">{{ old('description', $book->description) }}</textarea>
                    </div>
                    <select class="form-select mb-3" name="category_id">
                        <option selected value="0">Choose category</option>
                        @foreach ($categories as $category)
                            <option value="{{ old('category_id', $book->category_id) }}"
                                @if ($category->id == old('category_id')) selected @endif>
                                {{ $category->title }}</option>
                        @endforeach
                    </select>
                    <div class="img-small-ch mt-3">
                        @forelse($book->getPhotos as $photo)
                            <div class="image">
                                <label for="{{ $photo->id }}-del-photo">
                                    X
                                </label>
                                <input type="checkbox" value="{{ $photo->id }}" id="{{ $photo->id }}-del-photo"
                                    name="delete_photo[]">
                                <img src="{{ $photo->url }}" alt="photo">
                            </div>
                        @empty
                            <div class="img-small mt-3">
                                <h5>// Book has no images</h5>
                            </div>
                        @endforelse
                    </div>
                    <div data-clone class="input-group mb-3">
                        <span class="input-group-text">Photo</span>
                        <input type="file" class="form-control" name="photo[]" multiple>
                    </div>

                    <button type="submit" class="btn btn-primary mt-4">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
