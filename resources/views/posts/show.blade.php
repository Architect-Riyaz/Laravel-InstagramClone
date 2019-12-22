@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8">
            <img src="/storage/{{$post->image}}" style="height: 80vh;">
        </div>
        <div class="col-4">
            <div class="d-flex">
                <div class="pr-3">
                    <img src="{{$post->user->profile->profileImage()}}" alt="" class="rounded-circle" style="max-width:40px;">
                </div>
                <h1><a href="/profile/{{$post->user->id}}"><span class="text-dark">{{$post->user->username}}</span></a></h1>
            </div>
            <hr>
            <p><span class="pr-3"><a href="/profile/{{$post->user->id}}"><span class="text-dark">{{$post->user->username}}</span></a></span>{{$post->caption}}</p>
        </div>
    </div>
</div>
@endsection
