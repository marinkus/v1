@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            @forelse($models as $model)
                <div class="col-3 form-div mt-2">
                    @if ($model->getPhotos()->count())
                        <img src="{{ $model->lastImageUrl() }}" alt="#">
                    @endif
                    <h3 class="heading">{{ $model->title }}, {{ $model->price }} Eur</h3>
                    <p class="description">{{ $model->comment }}</p>
                    <p>{{ $model->created_at }}</p>
                    <div class="buttons mb-2">
                        <a href="{{ route('model_edit', $model) }}" type="button" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('model_delete', $model) }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger" @if (Auth::user()->role < 10) style="opacity: 0.3" disabled @endif>Delete</button>
                        </form>
                    </div>
                </div>
            @empty
                <p class="description">Photos will be uploaded soon.</p>
            @endforelse

        </div>
    </div>
@endsection
