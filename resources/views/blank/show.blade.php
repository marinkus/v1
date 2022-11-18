@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-contnent-center">
            <div class="col-5">
                <div class="card">
                    <div class="card-header">
                        <h2>{{ $model->title }}</h2>
                    </div>
                    <div class="card-body">
                        @if ($model->image)
                        <img src="{{$model->image}}" alt="photo">
                        @endif
                        <h3>Price: {{ $model->price }} Eur</h3>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
