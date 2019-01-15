@extends('layouts.main')

@section('title', "Tag: {{ $tag->name }}")

@section('content')

    <div style="margin-top:2rem; margin-left:5rem">
        <a href="/tags"><button type="button" class="btn btn-primary">Return To List</button></a>
    </div>

    <div class="custom-border">
        <div class="title">
            <h2>Tag: {{ $tag->name }}</h2>
        </div>
        <div>
            <table class="table">
                <thead>
                    <tr>
                        <th>標題</th>
                        <th>發表時間</th>
                        <th>最後更新</th>
                    </tr>
                </thead>
                @inject('articlePresenter', 'App\Presenters\ArticlePresenter')
                @inject('dateTimeformatPresenter', 'App\Presenters\DateTimeformatPresenter')
                <tbody>
                    @foreach (($paginator = $articlePresenter->getArticlesByTag($tag))->all() as $article)
                    <tr>
                        <td><a href="/articles/{{ $article->id }}">{{ $article->title }}</a></td>
                        <td>{{ $dateTimeformatPresenter->formatDate($article->created_at) }}</td>
                        <td>{{ $dateTimeformatPresenter->formatDate($article->updated_at) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {!! $paginator->links() !!}
        </div>
    </div>
@endsection