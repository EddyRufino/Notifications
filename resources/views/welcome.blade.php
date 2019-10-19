@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            {{-- <div class="card-header">Inicio</div> --}}

            <ul class="list-group">
                @forelse (App\Post::latest()->get() as $post)

                    <li class="list-group-item mb-2 shadow">
                        <a href="{{ route('posts.show', $post) }}">
                            {{ $post->title }}
                        </a>
                    </li>

                @empty

                @endforelse
            </ul>

        </div>
    </div>
</div>
@endsection
