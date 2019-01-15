@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    <form method="POST" action="/verified">
                        @csrf
                        <div class="btn">
                            <button>Verified Me</button>
                        </div>
                    </form>
                     
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-header">Blogging</div>

                <div class="card-body">
                    <div class="btn">
                        <button><a href="/articles">All Articles</a></button>
                    </div>
                    <div class="btn">
                        <button><a href="/tags">All Tags</a></button>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
