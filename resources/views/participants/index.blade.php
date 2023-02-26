@extends('layouts.app')
@section('content')
    <h1>Liste des participants</h1>
    <hr>
    <a href="/participants/create">Creation de participant</a>
    <hr>
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <th>Nom et prenom</th>
            <th>Email</th>
            <th>Commentaire</th>
            <th colspan="2"></th>
        </thead>
        @foreach($participants as $participant)
            <tbody>
                <td>{{ $participant->name }}</td>
                <td>{{ $participant->email }}</td>
                <td>{{ $participant->comment }}</td>
                <td>
                    <a href="/participants/{{ $participant->id }}/edit"
                    class="btn btn-primary btn-sm">
                        Modifier
                    </a>
                </td>
                <td>
                    <form action="/participants/{{ $participant->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                        onclick="return confirm('Etes vous sure de vouloir supprimer ?')"
                        class="btn btn-danger btn-sm">Supprimer</button>
                    </form>
                </td>
            </tbody>
        @endforeach
    </table>
@stop