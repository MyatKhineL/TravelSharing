@extends('master')
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-xl-8">

                <div class="post mb-4">
                    <div class="row">
                        <h4 class="fw-bold mb-4">{{ $post->title }}</h4>
                        <img src="{{ asset("storage/cover/".$post->cover) }}" class="cover-img rounded-3 mb-4 w-100" alt="">

                        <p class="text-black-50 mb-4 post-detail">
                            {{ $post->description }}
                        </p>

                        @if($post->galleries->count())
                            <div class="gallery border rounded mb-5">
                                <h4 class="text-center fw-bold mt-4">Post Gallery</h4>

                                <div class="row g-4 py-4 px-2 justify-content-center">
                                    @foreach($post->galleries as $gallery)
                                    <div class="col-6 col-lg-4 col-xl-3">
                                        <a class="venobox" data-gall="gallery"  href="{{ asset('storage/gallery/'.$gallery->photo) }}">
                                            <img src="{{ asset('storage/gallery/'.$gallery->photo) }}" class="gallery-photo">
                                        </a>

                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        @endisset

                        <div class="mb-5">
                            <h4 class="text-center fw-bold mb-4">Users Comment</h4>
                            <div class="row justify-content-center">

                                <div class="col-lg-8">

                                    <div class="comments">

                                        @forelse($post->comments as $comment)
                                        <div class="border rounded p-3 mb-3">
                                            <div class="d-flex justify-content-between mb-3">
                                                <div class="d-flex">
                                                    <img src="{{ asset($comment->user->photo) }}" class="user-img rounded-circle" alt="">
                                                    <p class="mb-0 ms-2 small">
                                                        {{ $comment->user->name }}
                                                        <br>
                                                        <i class="fas fa-calendar"></i>
                                                        {{ $comment->created_at->diffforhumans() }}
                                                    </p>
                                                </div>
                                                @can('delete',$comment)
                                                <form class="" method="post" action="{{ route('comment.destroy',$comment->id) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-outline-danger rounded-circle btn-sm">
                                                        <i class="fas fa-trash-alt "></i>
                                                    </button>
                                                </form>
                                                @endcan
                                            </div>

                                            <p class="mb-0">
                                                {{ $comment->message }}
                                            </p>
                                        </div>
                                        @empty
                                        <p class="text-center">
                                            There is no Comment yet !
                                            @auth
                                                Start comment now.
                                            @endauth
                                            @guest
                                            <a href="{{ route('login') }}">Login</a> to comment
                                            @endguest
                                        </p>
                                        @endforelse

                                    </div>

                                    @auth
                                    <form action="{{ route('comment.store') }}" method="post" id="comment-create">
                                        @csrf
                                        <input type="hidden" name="post_id"  value="{{ $post->id }}">
                                        <div class="form-floating mb-3">
                                            <textarea class="form-control @error('message') is-invalid @enderror" name="message" placeholder="Leave a comment here" style="height: 150px" id="floatingTextarea"></textarea>
                                            <label for="floatingTextarea">Comments</label>
                                            @error('message')
                                            <div class="invalid-feedback ps-2">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="text-center">
                                            <button class="btn btn-primary">Comment</button>
                                        </div>
                                    </form>
                                    @endauth
                                </div>
                            </div>

                        </div>

                        <div class="d-flex justify-content-between align-items-center border rounded p-4">
                            <div class="d-flex">
                                <img src="{{ asset($post->user->photo) }}" class="user-img rounded-circle" alt="">
                                <p class="mb-0 ms-2 small">
                                    {{ $post->user->name }}
                                    <br>
                                    <i class="fas fa-calendar"></i>
                                    {{ $post->created_at->format("d M Y") }}
                                </p>
                            </div>
                            <div>
                                @auth
                                    @can('delete',$post)
                                    <form action="{{ route('post.destroy',$post->id) }}" method="post" class="d-inline-block">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-danger">
                                            <i class="fas fa-trash-alt fa-fw"></i>
                                        </button>
                                    </form>
                                    @endcan

                                    @can("update",$post)
                                    <a href="{{ route('post.edit',$post->id) }}" class="btn btn-outline-warning">
                                        <i class="fas fa-edit fa-fw"></i>
                                    </a>
                                    @endcan
                                @endauth
                                <a href="{{ route('index') }}" class="btn btn-outline-primary">Read All</a>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>



@stop
