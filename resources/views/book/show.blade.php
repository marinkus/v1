@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 form-div mt-2">
                <h2>Book</h2>
                <h4 class="heading">Title: {{ $book->title }}</h4>
                <h6 class="catname">Category: {{ $book->getCategory->title }}</h6>
                <p class="description"> ISBN: {{ $book->isbn }}</p>
                <p class="description"> Pages: {{ $book->pages }}</p>
                <p class="description">{{ $book->description }}</p>
                @forelse($book->getPhotos as $photo)
                    <img class="image" src="{{ $photo->url }}" alt="photo">
                @empty
                    <p class="description">// Book has no images</p>
                @endforelse
                <div class="buttons">
                    <a href="{{ route('b_show', $book) }}" type="button" class="btn btn-info">Show
                        info</a>
                    <a href="{{ route('b_edit', $book) }}" type="button" class="btn btn-warning">Edit
                        info</a>
                    <form action="{{ route('b_delete', $book) }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger" @if (Auth::user()->role < 5) style="opacity: 0.4" disabled @endif>Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
