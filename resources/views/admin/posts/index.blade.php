@extends('layouts.app')

@section('content')

<div class="container">
    <h1>I tuoi post personali</h1>

    @if($posts->isEmpty())
        <h3>Non hai ancora creato nessun post</h3>
    @else 
        
    @endif
</div>

@endsection