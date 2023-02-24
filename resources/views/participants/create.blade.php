@extends('layouts.app')
@section('content')
<h4>Creation des participants</h4>
<hr>
<a href="/participants">Liste des participants</a>
<hr>
@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<form action="/participants/create" method="post">
    @csrf
    <div class="mb-3">
        <label for="name" class="form-label">Nom et prenom</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name">
        @error('name')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="enail" class="form-label">Email address</label>
        <input type="text" name="email" value="{{ old('email') }}" class="form-control" id="email">
        @error('email')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3 form-check">
        <label for="enail" class="form-label">Commentaire</label>
        <textarea name="comment" class="form-control" id="" cols="30" rows="10">{{ old('comment') }}</textarea>
        @error('comment')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Soumettre</button>
</form>

@stop