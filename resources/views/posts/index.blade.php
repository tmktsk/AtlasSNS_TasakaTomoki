@extends('layouts.login')

@section('content')
    <div class="container">
        <img  src="{{ asset('images/' . Auth::user()->images) }}" alt="User Icon" class="postIcon">
        {!! Form::open(['url' => '/create', 'method' => 'POST']) !!}
            {{ Form::input('text', 'post', null, ['required', 'class' => 'post-form', 'placeholder' => '投稿内容を入力してください。']) }}
            <input type="image" src="images/post.png" class="post-img">
        {!! Form::close() !!}
    </div>
    @if(session('postContent'))
        <div class="post-content">
            <img src="{{ asset('images/' . Auth::user()->images) }}" alt="User Icon" class="postIcon">
            <span class="username">{{ Auth::user()->username }}</span>
            <span class="content">{{ session('post') }}</span>
        </div>
    @endif
        <!-- <input type="image" src="images/edit.png" alt="編集" data-toggle="modal" data-target="#editModal" class="edit-post-btn" /> -->
    <!-- ゴリゴリコードからコピペ -->
    <div class="modal-open-button">
    <a class="js-open-button" href="#" data-target=".target-modal">
        <img src="images/edit.png" alt="編集">
    </a>
    </div>
    <div class="modal-contact target-modal">
        <div class="modal-contact-head">見出し</div>
        <div class="modal-contact-content">
            <div class="modal-contact-title">タイトル1</div>
            <div class="modal-contact-text">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</div>
            <div class="modal-contact-title">タイトル2</div>
            <div class="modal-contact-text">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</div>
            <div class="modal-contact-title">タイトル3</div>
            <div class="modal-contact-text">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</div>
            <div class="modal-contact-title">タイトル4</div>
            <div class="modal-contact-text">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</div>
        </div>
        <div class="modal-contact-button">
            <a class="js-close-button" href="" data-target=".target-modal">閉じる</a>
        </div>
        <div class="modal-contact-icon">
            <a class="js-close-button" href="" data-target=".target-modal"><img src="img/02.png" alt=""></a>
        </div>
    </div>
<div class="modal-contact-background target-modal"></div>

<script>
    $(function() {
    $('.js-open-button').on('click', function(e) {
        e.preventDefault();
        var target = $(this).data('target');
        $(target).fadeIn();
    });

    $('.js-close-button').on('click', function(e) {
        e.preventDefault();
        var target = $(this).data('target');
        $(target).fadeOut();
    });
    });
</script>

@endsection
