@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">

{{--                <div class="breadcrumb">{{ $comment->content }}</div>--}}
{{--                <ul class="list-group">--}}
{{--                    @foreach ($comment->notes as $note)--}}
{{--                        <li class="list-group-item">{{ $note->body }}</li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}

{{--                <form method="POST" action="/comments/{{ $comment->id}}/notes">--}}
{{--                    {{ csrf_field() }}--}}
{{--                    <div class="form-group">--}}
{{--                        <textarea name="body" class="form-control"></textarea>--}}
{{--                    </div>--}}

{{--                    <div class="form-group">--}}
{{--                        <button type="submit" class="btn btn-primary">Add Comment</button>--}}
{{--                    </div>--}}
{{--                </form>--}}
                <div class="breadcrumb"></div>
                <ul class="list-group">

                        <li class="list-group-item"></li>

                </ul>

                <form method="POST" action="/comments/notes">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <textarea name="body" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add Comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
