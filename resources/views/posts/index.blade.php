@extends('layouts.login')

@section('content')
    <div class="container">
        <img  src="{{ asset('images/'. Auth::user()->images) }}" alt="User Icon" class="postIcon">
        {!! Form::open(['url' => '/create', 'method' => 'POST']) !!}
            {{ Form::input('text', 'post', null, ['required', 'class' => 'post-form', 'placeholder' => '投稿内容を入力してください。']) }}
            <input type="image" src="images/post.png" class="post-img">
        {!! Form::close() !!}
    </div>
    @foreach ($posts as $post)
        <div class="post-content">
            <img src="{{ asset('images/' . Auth::user()->images) }}" alt="User Icon" class="postIcon">
            <span class="username">{{ $post->user->username }}</span>
            <span class="post">{!! $post->post !!}</span>
            <form
                style="disply: inline-block;"
                method="GET"
                action="{{ route('post.delete', $post->id) }}">
                @csrf
                @method('DELETE')
                <div class="dlt-btn-cntainer">
                    <button class="dlt-btn">
                        <img src="images/trash.png" alt="削除ボタン1" class="normal-img" width="50" height="50">
                        <img src="images/trash-h.png" alt="削除ボタン2" class="hover-img" width="50" height="50">
                   </button>
                </div>
            </form>
            <div class="content">
                <a class="js-modal-open" href="#" post="{{ $post->post }}" post_id="{{ $post->id }}">
                    <img src="images/edit.png" alt="編集" class="edit-img" width="50" height="50">
                </a>
            </div>
        </div>
    @endforeach
        <div class="modal js-modal">
            <div>class="modal__bg js-modal-close"></div>
            <div class="modal__content">
                <form action="{{ route('update', ['id' => $post->id]) }}" method="POST">
                    @csrf
                    <textarea name="update" id="modal_post">{{ $post->post }}</textarea>
                    <input type="hidden" name="" class="modal_id" value="">
                    <input type="image" src="images/edit.png" alt="更新ボタン" class="update-btn" width="50" height="50">
                </form>
                <a class="js-modal-close" href="#">✖</a>
            </div>
        </div>

@endsection
