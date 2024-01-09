@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3 p-5">
                <img
                    src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fmiro.medium.com%2Fmax%2F2400%2F1*B6_f-_SxscJ9FCuIjOrQAQ.jpeg&f=1&nofb=1&ipt=6ac7bc380d3519e50b6acd3cf85c6321a4279cee1f8e8d8eb95a762e1a3b5f5f&ipo=images"
                    class="rounded-circle" style="height: 90px;" alt="profile">
            </div>
            <div class="col-9 pt-5">
                <div class="div flex justify-between align-items-baseline">
                    <h1 class="text-3xl font-bold">{{ $user->username }}</h1>
                    <a href="/p/create">Add New Post</a>
                </div>
                <a href="/profile/{{ $user->id }}/edit"> Edit Profile</a>
                <div class="pt-5 d-flex">
                    <div class="pr-3"><strong>{{{$user->posts->count()}}}</strong> posts</div>
                    <div class="pr-3"><strong>23k</strong> followers</div>
                    <div class="pr-3"><strong>212</strong> following</div>
                </div>
                <div class="pt-4 font-extrabold">{{$user->profile->title}}</div>
                <div>{{$user->profile->description}}</div>
                <div><a href="#">{{$user->profile->url}}</a></div>
            </div>
        </div>
        <div class="row pt-5">
            @foreach($user->posts as $post)
                <div class="col-4">
                    <a href="/p/{{ $post->id }}">
                        <img
                            src="/storage/{{$post->image}}"
                            class="w-100" alt="">
                    </a>
                </div>
            @endforeach

        </div>
    </div>
@endsection
