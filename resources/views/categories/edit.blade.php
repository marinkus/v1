@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-contnent-center">
            <div class="col-5">
                <div class="card">
                    <div class="card-header">
                        <h2>Edit Category</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{route('c_update', $category)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                              <span class="input-group-text">Title</span>
                              <input value="{{$category->title}}" type="text" class="form-control" name="title">
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Update category</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
