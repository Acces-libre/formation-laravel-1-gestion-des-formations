@extends('layouts.app')
@section('content')
<h4>Creation des formations</h4>
<hr>
<a href="/formations">Liste des formations</a>
<hr>
@if (session()->has('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<form action="/formations" method="post">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Titre</label>
        <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="name">
        @error('title')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="enail" class="form-label">Technologie</label>
        <select name="technology_id" id="" class="form-control">
            @foreach($technologies as $technology)
                <option value="{{ $technology->id }}">
                    {{ $technology->name }}
                </option>
            @endforeach
        </select>
        @error('technology_id')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3 form-check">
        <label for="description" class="form-label">Description</label>
        <textarea name="description"
        class="form-control" id="" cols="30" rows="10">{{ old('description') }}</textarea>
        @error('description')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="start_at" class="form-label">Date de debut</label>
        <input type="date" name="start_at" value="{{ old('start_at') }}" class="form-control" id="email">
        @error('start_at')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="end_at" class="form-label">Date de fin</label>
        <input type="date" name="end_at" value="{{ old('end_at') }}" class="form-control" id="email">
        @error('end_at')
            <div class="alert alert-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Soumettre</button>
</form>

@stop