@extends('layouts.app')

@section('content')
    <div class="container --content">
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="card">
                    <div class="card-body">
                        <ul class="list-group">
                            @forelse($categories as $category)
                                <li class="list-group-item">
                                    <div class="categories-list">
                                        <div class="content">
                                                <h4>{{ $category->title }}</h4>
                                                <small> Books count in category: {{$category->getBooks()->count()}}</small>
                                                <div class="buttons">
                                                    <a href="{{ route('c_show', $category) }}" class="btn btn-info">Show</a>
                                                    {{-- @if(Auth::user()->role >=10) --}}
                                                    <a href="{{ route('c_edit', $category) }}" class="btn btn-success">Edit</a>
                                                    <form action="{{ route('c_delete', $category) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="btn btn-danger">Delete</button>
                                                    </form>
                                                    {{-- @endif --}}
                                                </div>
                                        </div>
                                    </div>
                                </li>
                            @empty
                                <li class="list-group-item">No categories found</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
