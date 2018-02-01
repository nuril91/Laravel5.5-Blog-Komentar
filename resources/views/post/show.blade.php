@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">{{ $post->title }}</div>

                    <div class="panel-body">
                        <p>{{ $post->content }}</p>
                    </div>
                </div>

                <div class="panel panel-default">
                    <div class="panel-heading">{{ $post->comments()->count() }} Komentar</div>
                    @foreach ($post->comments()->get() as $comment)
                        <div class="panel-body">
                            <h3>{{ $comment->user->name }} - <small>{{ $comment->created_at }}</small></h3>
                            <p>{{ $comment->message }}</p>
                        </div>
                    @endforeach

                    <div class="panel-heading">Tambahkan Komentar</div>

                    <div class="panel-body">
                        <form class="form-horizontal has-feedback{{ $errors->has('message') ? ' has-error' : '' }}" action="{{ route('post.comment.store', $post) }}" method="post">
                            {{ csrf_field() }}
                            <textarea class="form-control" name="message" rows="3" placeholder="Berikan Komentar...">{{ old('message') }}</textarea>
                            @if ($errors->has('message'))
                                <span class="help-block">
                                    <p>{{ $errors->first('message') }}</p>
                                </span>
                            @endif
                            <input type="submit" value="Tambah Komentar" class="btn btn-primary" style="margin-top:15px;">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
