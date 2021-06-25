@extends('layouts.app')

@section('content')

<div class="container-fluid">
    @auth
    <a href="{{ url('/posts/myPosts') }}" style="position: relative;left: 100px">
        <button class="btn btn-primary">
        {{ __('My Posts') }}
        </button>
    </a>
    <a href="{{ route('users.edit', Auth::user()->id) }}" style="position: relative;left: 1250px">
        <button class="btn btn-primary">
        {{ __('Details User') }}
        </button>
    </a>
    @endauth
    @foreach ($posts as $post)
    <div class="row align-items-center h-100">
        <div class="card col-md-8 mx-auto">
            <div class="card-body">
                <h5 class="card-title">
                    <a href="{{ url("/posts/" . $post->id) }}">
                        {{ $post->title}}
                    </a>
                </h5>
                 @if (Request::url() == url('/posts/myPosts'))
                    <form method="POST" action="{{ url('/posts/myPosts/' . $post->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary" style="position: relative;left: 900px;bottom: 27px">{{ __('Delete') }}</button> 
                    </form>
                @endif
            </div>
        </div>
    </div>
    @endforeach
    {{ $posts->links() }}
</div>
@endsection