@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="mb-3">Edita il post: {{ $post->title }}</h1>
    
    {{-- SEZIONE VISUALIZZAZIONE EVENTUALI ERRORI ALL'INVIO DELLA FORM --}}
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('admin.posts.update', $post->id) }}" method="post">
        @csrf
        @method("PATCH")
        <div class="form-group">
            <label for="title">Titolo Post</label>
            <input class="form-control" type="text" id="title" name="title" value="{{ old('title', $post->title) }}">
        </div>
        <div class="form-group">
            <label for="body">Contenuto del post</label>
            <textarea class="form-control" cols="30" rows="10" id="body" name="body">{{ old('body', $post->body) }}</textarea>
        </div>
        <input class="btn btn-warning" type="submit" value="Edita il tuo post">
    </form>

</div>

@endsection