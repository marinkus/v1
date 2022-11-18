@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-contnent-center">
            <div class="col-5">
                <div class="card">
                    <div class="card-header">
                        <h2>New Book</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('b_store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="input-group mb-3">
                                <span class="input-group-text">Title</span>
                                <input value="{{ old('title') }}" type="text" class="form-control" name="title">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">ISBN</span>
                                <input value="{{ old('isbn') }}" type="text" class="form-control" name="isbn">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Pages count</span>
                                <input value="{{ old('pages') }}" type="number" class="form-control" name="pages">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Description</span>
                                <textarea name="description" cols="30" rows="10">{{ old('description') }}</textarea>
                            </div>
                            <select class="form-select mb-3" name="category_id">
                                <option selected value="0">Choose category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if ($category->id == old('category_id')) selected @endif>
                                        {{ $category->title }}</option>
                                @endforeach
                            </select>
                            <div data-clone class="input-group mb-3">
                                <span class="input-group-text">Photo</span>
                                <input type="file" class="form-control" name="photo[]" multiple>
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Add book</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
