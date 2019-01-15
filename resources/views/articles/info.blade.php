@extends('layouts.main')

@section('title', "Article Content")

@section('content')

    <div class="custom-border">
        <div class="title">
            <h2>{{ $article->title }}</h2>
        </div>
        <div class="content">
            <article>
                {!! $article->content !!}
            </article>
        </div>
        <br>
        @isset ($article->tags)
        <div role="group">
            @foreach ($article->tags as $tag)
            <a href="/tags/{{ $tag->id }}" class="badge badge-info">{{ $tag->name }}</a>
            @endforeach
        </div>
        @endisset
    </div>
    
@endsection