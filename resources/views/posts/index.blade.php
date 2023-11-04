@extends('layouts.login')

@section('content')
    <div class="head-container">
        @if(optional(Auth::user())->check)
        <img  src="{{ asset('storage/'. Auth::user()->images) }}" alt="User Icon" class="userIcon">
        @else
        <img  src="{{ asset('images/'. Auth::user()->images) }}" alt="User Icon" class="userIcon">
        @endif
        {!! Form::open(['url' => '/create', 'method' => 'POST']) !!}
            @csrf
            {{ Form::input('text', 'post', null, ['required', 'class' => 'post-form', 'placeholder' => '投稿内容を入力してください。']) }}
            <input type="image" src="images/post.png" class="post-img">
        {!! Form::close() !!}
    </div>
    @foreach ($posts as $post)
        <div class="post-content">
            @if(optional(Auth::user())->check)
            <img src="{{ asset('storage/'. $post->user->images) }}" alt="User Icon" class="postIcon">
            @else
            <img src="{{ asset('images/'. $post->user->images) }}" alt="User Icon" class="postIcon">
            @endif
            <span class="username">{{ $post->user->username }}</span>
            <span class="timestamp">{{ $post->created_at->format('Y-m-d H:i') }}</span>
            <span class="post">{!! nl2br(e($post->post)) !!}</span>
            <form
                style="disply: inline-block;"
                method="GET"
                action="{{ route('post.delete', $post->id) }}">
                @csrf
                @method('DELETE')
                @if(Auth::check() && Auth::user()->id === $post->user_id)
                    <div class="dlt-btn-cntainer">
                        <button class="dlt-btn">
                            <img src="images/trash.png" alt="削除ボタン1" class="normal-img" width="50" height="50">
                            <img src="images/trash-h.png" alt="削除ボタン2" class="hover-img" width="50" height="50">
                        </button>
                    </div>
                @endif
            </form>
            <div class="content">
                @if(Auth::check() && Auth::user()->id === $post->user_id)
                    <a class="js-modal-open" href="#" data-post="{!! $post->post !!}" data-post_id="{{ $post->id }}">
                        <img src="images/edit.png" alt="編集" class="edit-img" width="50" height="50">
                    </a>
                @endif
            </div>
        </div>
    @endforeach
    @if(isset($post))
        <div class="modal js-modal">
            <div class="modal__bg js-modal-close"></div>
            <div class="modal__content">
                <form id="updateForm" action="{{ route('update') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="hidden" name="id" id="modal_id" value="{{ $post->id }}">
                        <label for="modal_post"></label>
                        <textarea id="modal_post" name="update" class="form-control">{{ $post->post }}</textarea>
                    </div>
                    <input type="image" src="images/edit.png" alt="更新ボタン" class="update-btn" width="50" height="50">
                    {{ csrf_field() }}
                </form>
                <a class="js-modal-close" href="#">✖</a>
            </div>
        </div>
    @endif
@endsection
