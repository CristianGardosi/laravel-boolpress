@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="mb-5">Post pubblici del blog</h1>

    @if($posts->isEmpty())
        <h3>Ancora nessun post è stato creato</h3>
    @else
        @foreach($posts as $post)
            <article class="mb-5">
                <h2>{{$post->title}}</h2>
                <h3>Scritto da: {{$post->user->name}}</h3>
                <h4>In data: {{$post->created_at->format('d/m/Y')}}</h4>
                <a href="{{ route('posts.show', $post->slug) }}">Leggi il post completo</a>
            </article>
        @endforeach
    @endif

</div>

@endsection