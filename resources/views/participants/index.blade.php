@extends('layouts.app')
@section('content')
    <h1>Liste des participants</h1>
    <hr>
    <a href="/participants/create">Creation de participant</a>
    <hr>
    <table class="table">
        <thead>
            <th>Nom et prenom</th>
            <th>Email</th>
            <th>Commentaire</th>
        </thead>
        @foreach($participants as $participant)
            <tbody>
                <td>{{ $participant->name }}</td>
                <td>{{ $participant->email }}</td>
                <td>{{ $participant->comment }}</td>
            </tbody>
        @endforeach
    </table>
@stop