@extends('layouts.app')

@section('content')
    <div class="container --content">
        <div class="row justify-contnent-center">
            <div class="col-8">
                <div class="card-body">
                    <h2>Books List:</h2>
                    <ul class="list-group">
                        @forelse($books as $book)
                            <li class="list-group-item">
                                <div class="posts-list">
                                    <div class="content">
                                        <h4>{{ $book->title }}</h4>
                                        <h5>Category: <a href="{{route('c_show', $book->getCategory->id)}}"> {{ $book->getCategory->title }}</a></h5>
                                        @if($book->getPhotos()->count())
                                            <h5><a href="{{$book->lastImageUrl()}}" target="_BLANK">Photo 1 of [{{$book->getPhotos->count()}}]</a></h5>
                                        @endif
                                    </div>
                                    <div class="buttons">
                                        <a href="{{ route('b_show', $book) }}" @if (Auth::user()->role < 5) style="opacity: 0.4" disabled @endif type="button" class="btn btn-info">Show
                                            info</a>
                                        <a href="{{ route('b_edit', $book) }}" @if (Auth::user()->role < 5) style="opacity: 0.4" disabled @endif type="button" class="btn btn-warning">Edit
                                            info</a>
                                        <form action="{{ route('b_delete', $book) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @empty
                            <li class="list-group-item">No books found</li>
                        @endforelse
                    </ul>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
