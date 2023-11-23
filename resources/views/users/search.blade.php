@extends('layouts.login')
@section('content')
  <div class="fw-container">
    <form action="{{ route('user.search') }}" method="GET" class="search-box">
      @csrf
      <input type="text" name="search" class="search-form" placeholder="ユーザー名">
      <input type="image" src="{{ asset('images/search.png') }}" class="search-btn" alt="検索">
    </form>
    @if($searchWord)
      <div class="search-word">検索ワード：{{ $searchWord }}</div>
    @endif
  </div>
  @foreach($user as $datauser)
    <div class="search">
      @if(optional($datauser)->check)
        <img  src="{{ asset('storage/'. $datauser->images) }}" alt="User Icon" class="searchIcon">
      @else
        <img src="{{ asset('images/'. $datauser->images) }}" alt="ユーザーアイコン" class="searchIcon">
      @endif
      <span class="search-name">{{ $datauser->username }}</span>
      <div class="btn-container">
        @if(auth()->user()->isFollowing($datauser))
          <form action="{{ route('unfollow', ['user' => $datauser->id]) }}" method="POST">
            @csrf
            <input type="submit" class="btn btn-danger" name="action" value="フォロー解除">
          </form>
        @else
          <form action="{{ route('follow', ['user' => $datauser->id]) }}" method="POST">
            @csrf
            <input type="submit" class="follow-btn" name="action" value="フォローする">
          </form>
        @endif
      </div>
    </div>
  @endforeach
@endsection
