@extends('layouts.app')
@section('content')
<div class="row" style="margin-top: 100px">
    <div class="col-md-4 shadow-lg p-3 mb-5 bg-white rounded">
        <h4>
            {{ $formation->title }}
            <small>{{ $formation->technology->name }}</small>
        </h4>
        <p>
            {{ $formation->desciption }}
        </p>
        <p>{{ Carbon\Carbon::parse($formation->start_at)->format('D d M Y') }}</p>
        <p>{{ Carbon\Carbon::parse($formation->end_at)->format('D d M Y') }}</p>
        <hr>
        <a href="/formations/{{ $formation->id }}/edit">Modifier</a>
    </div>
    <div class="col-md-8">
        @if (session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="/formation/{{ $formation->id }}/participants" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label for="participant_id" class="form-label">Participants</label>
                        <select name="participant_id" id="participant_id" class="form-control">
                            <option value="">Veuillez selectionner un participant</option>
                            @foreach($participants as $participant)
                                <option value="{{ $participant->id }}">
                                    {{ $participant->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('participant_id')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </div>
        </form>
        <table class="table">
            <thead>
                <th>Nom et prenom</th>
                <th>Email</th>
                <th></th>
            </thead>
            @foreach($formation->participants as $participant)
                <tbody>
                    <td>{{ $participant->name }}</td>
                    <td>{{ $participant->email }}</td>
                    <td>
                        <form
                        action="/formation/{{ $formation->id }}/participants/{{ $participant->id }}"
                         method="POST">
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
    </div>
</div>
@stop