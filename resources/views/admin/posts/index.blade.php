@extends('layouts.app')

@section('content')

<div class="container">
    <h1 class="mb-3">I tuoi post personali</h1>

    @if($posts->isEmpty())
        <h3>Non hai ancora nessun post, 
            <a href="{{ route('admin.posts.create') }}"> creane uno ora </a>
        </h3>
    @else 
        {{-- Tabella post --}}
        <table class="table">
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Titolo
                    </th>
                    <th>
                        Created
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>
                            {{ $post->id }}
                        </td>
                        <td>
                            {{ $post->title }}
                        </td>
                        <td>
                            {{ $post->created_at->format('d/m/Y') }}
                        </td>
                        <td>
                            <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-warning">Mostra</a>
                        </td>
                        <td>
                            <a href="#" class="btn btn-primary">Edita</a>
                        </td>
                        <td>
                            <a href="#" class="btn btn-danger">Cancella</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>

@endsection