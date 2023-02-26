@extends('layouts.app')
@section('content')
<h4>Modification de {{ $participant->name }}</h4>
<hr>
<a href="/participants">Liste des participants</a>
<hr>
@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<form action="/participants/{{ $participant->id }}" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Nom et prenom</label>
        <input type="text" name="name" value="{{ old('name') ?? $participant->name }}" class="form-control" id="name">
        @error('name')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="enail" class="form-label">Email address</label>
        <input type="text" name="email" value="{{ old('email') ?? $participant->email }}" class="form-control" id="email">
        @error('email')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3 form-check">
        <label for="enail" class="form-label">Commentaire</label>
        <textarea name="comment" class="form-control" id="" cols="30" rows="10">{{ old('comment') ?? $participant->comment }}</textarea>
        @error('comment')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Modifier</button>
</form>

@stop