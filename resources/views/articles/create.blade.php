@extends('layouts.main')

@section('title', 'Create Article')

@section('custom_css')
    @component('components.form_css')
        {{--  --}}
    @endcomponent
    {{-- Font Awesome --}}
    <link rel="stylesheet" 
    href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" 
    integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" 
    crossorigin="anonymous">
@endsection

@section('content')

    <div class="custom-border">
        <form method="POST" action="/articles">
            @csrf
            <div class="form-group">
            <label for="title">標題</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="輸入文章標題">
            </div>
            <div class="form-group">
                <label for="content">內文</label>
                <textarea class="form-control" name="content" id="content" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="tags">標籤</label>
                @inject('tagPresenter', 'App\Presenters\TagPresenter')
                <select class="form-control" name="tags[]" id="tags" multiple="multiple">
                    @foreach ($tagPresenter->getTagsByUser(auth()->user()) as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-append">
                        <div class="input-group-text btn" id="createNewTag"
                            data-container="body" data-placement="top" data-content="Tag created."
                        ><i class="fas fa-plus-circle"></i></div>
                    </div>
                    <input type="text" class="form-control" name="tagName" id="tagName" placeholder="標籤名稱">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    
@endsection

@section('custom_js')
    @component('components.form_js')
        {{--  --}}
    @endcomponent

    <script>
    $(function () {
        $('#tags').select2();

        var tagSelect = $('#tags');

        $('#createNewTag').popover('hide');

        $('#createNewTag').click(function () {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: "POST",
                url: "/tags",
                dataType: "json",
                data: {
                    "name": $('#tagName').val()
                },
                beforeSend: function () {
                    if ($('#tagName').val() == "") {
                        return false;
                    }
                }
            }).done(function (response) {
                if (response.created) {
                    var newOption = new Option(response.tag.name, response.tag.id, false, false);
                    tagSelect.append(newOption).trigger('change');

                    $('#createNewTag').popover('show');
                    $('#tagName').val("");
                }
            }).fail(function () {
                console.log('fail');
            }).always(function () {
                console.log('done');
            });
        });

        $('#createNewTag').on('shown.bs.popover', function () {
            var popoverElem = $(this);
            setTimeout(function(){
                popoverElem.popover('hide');
            },1200);
        })
        
    })
    </script>

@endsection