@extends('layouts.login')
@section('content')
<p>ユーザー検索</p>
@foreach($user as $datauser)
  <span class="post">{{ $datauser->username }}</span>
  <form action="{{ route('follow', ['user' => $datauser->id]) }}" method="POST">
    @csrf
    @if(auth()->user()->isFollowing($datauser))
      @method('DELETE')
      <button type="submit">アンフォロー</button>
    @else
      <button type="submit">フォロー</button>
    @endif
  </form>
@endforeach
@endsection
