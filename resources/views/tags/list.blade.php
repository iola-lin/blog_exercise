@extends('layouts.main')

@section('title', "All Tags")

@section('content')

    <div class="custom-border">
        @inject('tagPresenter', 'App\Presenters\TagPresenter')
            <div class="form-group">
                @foreach ($tagPresenter->getTagsByUser(auth()->user()) as $tag)
                    <h5><a href="/tags/{{ $tag->id }}" class="badge badge-info">{{ $tag->name }}</a></h5>
                @endforeach
            </div>
            
    </div>
    
@endsection