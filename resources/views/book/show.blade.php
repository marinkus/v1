@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 form-div mt-2">
                <h2>Book</h2>
                <h4 class="heading"><span class="small-text">Title: </span>{{ $book->title }}</h4>
                <p class="description"><span class="small-text">Category: </span>{{ $book->getCategory->title }}</p>
                @forelse($book->getPhotos as $photo)
                    <img class="image" src="{{ $photo->url }}" alt="photo">
                @empty
                    <p class="description">// Book has no images</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
