@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-xs-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $user->name }}</h3>
                </div>
                <div class="panel-body">
                    <img class="media-object img-rounded img-responsive" src="{{ Gravatar::src($user->email, 500) }}" alt="">
                </div>
            </div>
            @include('user_favorite.favorite_button', ['micropost' => $micropost])
        </aside>
        <div class="col-xs-8">
            <ul class="nav nav-tabs nav-justified">
                <li role="presentation" class="{{ Request::is('users/' . $micropost->id) ? 'active' : '' }}"><a href="{{ route('users.show', ['id' => $micropost->id]) }}">Microposts <span class="badge">{{ $count_microposts }}</span></a></li>
                <li role="presentation" class="{{ Request::is('users/*/favoritings') ? 'active' : '' }}"><a href="{{ route('users.favoritings', ['id' => $micropost->id]) }}">favoritings <span class="badge">{{ $count_favoritings }}</span></a></li>
            </ul>
            @include('microposts.microposts', ['microposts' => $microposts])
        </div>
    </div>
@endsection