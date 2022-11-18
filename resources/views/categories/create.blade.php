@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-contnent-center">
            <div class="col-5">
                <div class="card">
                    <div class="card-header">
                        <h2>New Category</h2>
                    </div>
                    <div class="card-body">
                        <form action="{{route('c_store')}}" method="post">
                            @csrf
                            <div class="mb-3">
                              <span class="input-group-text">Title</span>
                              <input value="{{old('title')}}" type="text" class="form-control"name="title">
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Create Category</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
