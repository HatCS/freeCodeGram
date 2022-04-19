@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-3 p-5 align-top ">
            <img src="{{ $user->profile->profileImage() }}" class="rounded-circle w-75">
        </div>
        <div class="col-9 pt-3">
            <div class="d-flex justify-content-between align-items-baseline" >

                <div class="d-flex align-items-center pb-3">
                    <div class="h4">{{$user->username}}</div>

                    <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>

                </div>

                @can ('update', $user->profile)
                    <a href="/p/create">Add new Post</a>
                @endcan

            </div>

           @can ('update', $user->profile)
                <a href="/profile/{{ $user->id }}/edit">Edit profile</a>
            @endcan

            <div class="d-flex">
                <div class="ps-1"><strong>{{ $postCount }}</strong> posts</div>
                <div class="ps-3"><strong>{{ $followersCount }}</strong> followers</div>
                <div class="ps-3"><strong>{{ $followingCount }}</strong> following</div>
            </div>
            <div class="pt-4 fw-bold"> {{ $user->profile->title}}</div>
            <div>{{ $user->profile->description }}</div>
            <div><a href="#">{{ $user->profile->url}}</div>
        </div>
    </div>
    <div class="row pt-5">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                //
                <a href="/p/{{$post->id}}">
                    <img src="/storage/{{$post->image}}" class="w-200">
                </a>
            </div>
        @endforeach
   </div>
</div>
@endsection
