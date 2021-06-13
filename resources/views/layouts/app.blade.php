<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <html lang="jp">
        <head>
          <!-- Required meta tags -->
          <meta charset="utf-8">
          <meta name="viewport" content="width=device-width, initial-scale=1">
          <!-- Bootstrap CSS -->
    <title>予約状況管理</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-light bg-light mb-3">
        <a class="navbar-brand">予約状況管理システム</a>
         <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                    <div class="btn-group" role="group" aria-label="Basic outlined example">
                        <a href="{{ url('/order') }}" class="btn btn-primary">一覧に戻る</a>

                        <a href="{{ url('/logout') }}"  class="btn btn-primary" onclick="return confirm('ログアウトしますか。')">ログアウト</a>
                      </div>
                    @else
                        @if (Route::has('register'))
                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                        <a href="{{ route('login') }}" class="btn btn-primary">ログイン</a>
                            <a href="{{ route('register') }}" class="btn btn-primary">新規登録</a>
                        </div>
                        @endif
                    @endauth
                </div>
            @endif本日は@php
        echo date("Y年n月j日");
        @endphp
        @if (Auth::check())
        <p> {{$user->name .'さん'}}
        @else
        <p>ゲストユーザー</p>
        @endif
    </nav>
    <div class="container-fluid">
        @yield('content')
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>
