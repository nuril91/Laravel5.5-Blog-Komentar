@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach ($posts as $post)
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <a href="{{ route('post.show', $post) }}">{{ $post->title }}</a>
                            <div class="pull-right">
                                <small>{{ $post->created_at }}</small>
                            </div>
                        </div>

                        <div class="panel-body">
                            <p>{{ str_limit($post->content, 200) }}</p>
                        </div>
                    </div>
                @endforeach

                {!! $posts->render() !!}
            </div>
        </div>
    </div>
@endsection
