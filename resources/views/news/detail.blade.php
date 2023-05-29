@extends('layouts.front')

@section('content')
    <div class="container">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
                <div class="row">
                    <div class="text col-md-6">
                        <div class="date">
                            {{ $news->updated_at->format('Y年m月d日') }}
                        </div>
                        <div class="title">
                            {{ Str::limit($news->title, 150) }}
                        </div>
                        <div class="body mt-3">
                            {{ Str::limit($news->body, 1500) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                    <div class="col-md-4 mx-auto">
                        <h2>コメント</h2>
                        @if (count($errors) > 0)
                            <ul>
                                @foreach($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form action="{{ route('comment.create') }}" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="comment" value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-10">
                                    <input type="hidden" name="id" value="{{ $news->id }}">
                                    @csrf
                                    <input type="submit" class="btn btn-primary" value="投稿">
                                </div>
                            </div>
                        </form>
                        <ul class="list-group">
                            @if ($news->comments != NULL)
                                @foreach ($news->comments as $comment)
                                    <li class="list-group-item">{{ $comment->comment }}</li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
        </div>
    </div>
    </div>
@endsection