@extends('layouts.app')
@section('content')
    <h1>Liste des formations | {{ Auth::user()->name }}</h1>
    <hr>
    <a href="/formations/create">Creation de formation</a>
    <hr>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <th>Titre</th>
            <th>Technologie</th>
            <th>Description</th>
            <th>Debut</th>
            <th>Fin</th>
            <th></th>
        </thead>
        @foreach($formations as $formation)
            <tbody>
                <td>{{ $formation->title }}</td>
                <td>{{ $formation->technology->name }}</td>
                <td>{{ $formation->desciption }}</td>
                <td>{{ Carbon\Carbon::parse($formation->start_at)->format('D d M Y') }}</td>
                <td>{{ Carbon\Carbon::parse($formation->end_at)->format('D d M Y') }}</td>
                <td>
                    <a href="/formations/{{ $formation->id }}">Details</a>
                </td>
            </tbody>
        @endforeach
    </table>
@stop