@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5">
                {{-- https://instagram.fbom2-1.fna.fbcdn.net/vp/96e223daac15e732765fae99ef16e834/5E0CEA75/t51.2885-19/12826006_1164977346868608_1007342699_a.jpg?_nc_ht=instagram.fbom2-1.fna.fbcdn.net --}}
        <img src="{{$user->profile->profileImage()}}" class="rounded-circle w-100">
        </div>
        <div class="col-9 p-5">
            <div class="d-flex justify-content-between align-items-baseline">
                <h1>{{$user->username}}</h1>
                <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
                @can ('update',$user->profile)
                    <a href="/p/create">Add new post</a>
                @endcan
                @can ('update',$user->profile)
                    <a href="/profile/{{$user->id}}/edit">Edit Profile</a>
                @endcan
            </div>
            <div class="d-flex">
                {{-- <div class="pr-5"><strong>{{$user->posts->count()}}</strong> Posts</div>
                <div class="pr-5"><strong>{{$user->profile->followers->count()}}</strong> Followers</div>
                <div class="pr-5"><strong>{{$user->following->count()}}</strong> Following</div> --}}
                <div class="pr-5"><strong>{{$postCount}}</strong> Posts</div>
                <div class="pr-5"><strong>{{$followersCount}}</strong> Followers</div>
                <div class="pr-5"><strong>{{$followingCount}}</strong> Following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{$user->profile->title}}</div>
            <div>{{ $user->profile->description}}</div>
            <div><a href="{{$user->profile->url ?? 'N/A'}}" target='_blank'>{{$user->profile->url ?? 'N/A'}}</a></div>
        </div>
    </div>
    <div class="row pt-4">
        @foreach($user->posts as $posts)
            
            <div class="col-4 pb-4">
                <a href="/p/{{$posts->id}}"> 
                    <img src="/storage/{{$posts->image}}"class="w-100">
                </a>
            </div>
        @endforeach    
    </div>
</div>
@endsection
