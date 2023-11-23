@extends('layouts.login')

@section('content')
<div class="fw-container">
  <h1 class="list-title">Follower List</h1>
  <div class="fw-head">
    @foreach ($users as $user)
      {!! Form::open(['url' => route('user.profile', ['user' => $user->id]), 'method' => 'post']) !!}
        @if(optional($user)->check)
          <input type="image" src="{{ asset('storage/'. $user->images) }}" alt="{{ $user->username }}のアイコン" class="fw-Icon">
        @else
          <input type="image" src="{{ asset('images/' . $user->images) }}" alt="{{ $user->username }}のアイコン" class="fw-Icon">
        @endif
      {!! Form::close() !!}
    @endforeach
  </div>
</div>
  @if($posts->count() > 0)
    @foreach ($posts as $post)
      <div class="fw-box">
        @if(optional($post->user)->check)
          <img  src="{{ asset('storage/'. $post->user->images) }}" alt="User Icon" class="fw-userIcon">
        @else
          <img  src="{{ asset('images/'. $post->user->images) }}" alt="User Icon" class="fw-userIcon">
        @endif
          <p class="fw-username">{{ $post->user->username }}</p>
          <p class="fw-timestamp">{{ $post->created_at->format('Y-m-d H:i') }}</p>
          <p class="fw-post">{{ $post->post }}</p>
      </div>
    @endforeach
  @endif
@endsection
