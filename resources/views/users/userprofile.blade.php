@extends('layouts.login')

@section('content')
<div class="head-container">
  @if(optional($user)->check)
    <img  src="{{ asset('storage/'. $user->images) }}" alt="User Icon" class="userIcon">
  @else
    <img  src="{{ asset('images/'. $user->images) }}" alt="User Icon" class="userIcon">
  @endif
  <div class="profile-content">
    <div class="profile">
      <div class="pro-flex">
        <p class="pro-item">name</p>
        <p class="pro-text">{{ $user->username }}</p>
      </div>
      <div class="pro-flex">
        <p class="pro-item">bio</p>
        <p class="pro-text">{{ $user->bio }}</p>
        @if(auth()->user()->isFollowing($user))
          <form action="{{ route('unfollow', ['user' => $user->id]) }}" method="POST" class="pro-btn">
            @csrf
            <input type="submit" class="btn btn-danger pro-btn-danger" name="action" value="フォロー解除">
          </form>
        @else
          <form action="{{ route('follow', ['user' => $user->id]) }}" method="POST" class="pro-btn">
            @csrf
            <input type="submit" class="pro-follow-btn" name="action" value="フォローする">
          </form>
        @endif
      </div>
    </div>

  </div>
</div>
@if ($user->posts->count() > 0)
  <div class="user-profile">
    @foreach ($user->posts as $post)
      @if(optional($user)->check)
        <img src="{{ asset('storage/'. $user->images) }}" alt="User Icon" class="propost-Icon">
      @else
        <img src="{{ asset('images/'. $user->images) }}" alt="User Icon" class="propost-Icon">
      @endif
      <div class="pro-block">
        <p class="propost-name">{{ $user->username }}</p>
        <p class="propost-post">{{ $post->post }}</p>
      </div>
      <p class="propost-time">{{ $post->created_at->format('Y-m-d H:i') }}</p>
    @endforeach
  </div>
@endif
@endsection
