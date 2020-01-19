@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img
                    src="{{$user->profile->profileImage()}}"
                    class="rounded-circle w-100">
            </div>
            <div class="col-9 pt-5">
                <div class="d-flex justify-content-between align-items-baseline">
                   <div class="d-flex  align-items-center pb-2">
                       <div class="h2">{{$user->username}}</div>
                       <follow-button user-id="{{$user->id}}" follows="{{$follows}}"></follow-button>
                   </div>
                    @can('update',$user->profile)
                        <a href="/p/create" class="btn btn-primary mr-1">Add Post</a>
                    @endcan
                </div>
                <div class="d-flex">
                    <div class="pr-4"><strong>{{$postCounts}}</strong> Posts</div>
                    <div class="pr-4"><strong>{{$followersCounts}}</strong> Followers</div>
                    <div class="pr-4"><strong>{{$followingCounts}}</strong> Following</div>
                </div>
                <div class="pt-2 font-weight-bold">{{$user->profile->title}}</div>
                <div>{{$user->profile->description}}
                </div>
                <div>
                    <a href="{{$user->profile->url}}">{{$user->profile->url}}</a>
                </div>
                @can('update',$user->profile)
                    <div class="pt-3">
                        <a href="/profile/{{$user->id}}/edit" class="btn btn-outline-success align-self-auto ">Edit
                            Profile</a>
                    </div>
                @endcan
            </div>
        </div>

        <div class="row pt-5">
            @foreach($user->posts as $post)
                <div class="col-4 pb-3">
                    <a href="/p/{{$post->id}}">
                        <img src="/storage/{{$post->image}}" class="w-100">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
`
