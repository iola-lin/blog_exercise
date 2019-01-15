@extends('layouts.main')

@section('title', 'Article List')

@section('custom-css')

    @component('components.list_css')
        {{--  --}}
    @endcomponent

@endsection

@section('content')

    <div class="custom-border">
        <div>
            <button>Create</button>
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
                @foreach ($articles as $article)
                <tr>
                    <td><input type="checkbox"></td>
                    <td><i class="fas fa-edit"></i></td>
                    <td><i class="fas fa-trash-alt"></i></td>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->created_at }}</td>
                    <td>{{ $article->updated_at }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection