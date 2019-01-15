@extends('layouts.main')

@section('title', 'Article List')

@section('custom_css')

    @component('components.list_css')
        {{--  --}}
    @endcomponent

@endsection

@section('content')

    <div class="custom-border">
        <div>
            <button type="button" class="btn btn-primary"><a herf="/articles/create">Create</a></button>
        </div>
        
        <br>

        <table class="table">
            <thead>
                <tr>
                    {{-- checkbox --}}
                    <th scope="col"></th>
                    {{-- edit btn --}}
                    <th scope="col"></th>
                    {{-- delete btn --}}
                    <th scope="col"></th>
                    {{-- article title --}}
                    <th scope="col">標題</th>
                    {{-- create time --}}
                    <th scope="col">發表時間</th>
                    {{-- update time --}}
                    <th scope="col">最後更新</th>
                </tr>
            </thead>

            <tbody>
                @inject('dateTimeFormatPresenter', 'App\Presenters\DateTimeFormatPresenter')
                @foreach ($articles as $article)
                <tr>
                    <td><input type="checkbox"></td>
                    <td><i class="fas fa-edit"></i></td>
                    <td>
                        <a href="/articles/{{ $article->id }}" data-method="DELETE" data-token="{{csrf_token()}}" data-confirm="Are you sure?">
                            <i class="fas fa-trash-alt"></i>
                        </a>
                    </td>
                    <td><a href="/articles/{{ $article->id }}">{{ $article->title }}</a></td>
                    <td>{{ $dateTimeFormatPresenter->formatDate($article->created_at) }}</td>
                    <td>{{ $dateTimeFormatPresenter->formatDate($article->updated_at) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {!! $articles->links() !!}
    </div>
@endsection

@section('custom_js')

    <script src="/js/laravel.js"></script>
    
@endsection