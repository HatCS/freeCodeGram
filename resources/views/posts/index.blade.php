@extends('layouts.app')

@section('content')
<div class="container">
    @foreach($posts as $post)
        <div class="row py-4">
            <div class="col-6 offset-2">
                <a href="/profile/{{$post->user->id  }}">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </a>
            </div>
        </div>
        <div class="row pt-2 pb-4">
            <div class="col-8 offset-2">
              <div>
                    <p>
                    <span div class="fw-bold">
                    <a href="/profile/{{ $post->user->id}}">
                          <span class="text-dark"> {{ $post->user->username}}
                    </a></span> {{ $post->caption }}
                    </p>
              </div>
            </div>
        </div>
    @endforeach

        <div class="row">
            <div class="col-1 d-flex justify-content-center">
                {{ $posts->links() }}
            </div>
        </div>

</div>
@endsection
