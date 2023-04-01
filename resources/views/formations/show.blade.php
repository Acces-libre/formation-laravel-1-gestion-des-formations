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

    <livewire:formation-participants-manager :formation='$formation' />
</div>
@stop
