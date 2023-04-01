<div class="col-md-8">
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form>
        <div class="row">
            <div class="col-md-8">
                <div class="mb-3">
                    <label for="participant_id" class="form-label">Participants</label>
                    <select wire:model.defer="participant_id" id="participant_id" class="form-control">
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
                <button wire:click.prevent="addParticipant" type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </div>
    </form>
    <hr>
    <input type="text" wire:model='searchText' class="form-control" placeholder="Rechercher un participant">
    <hr>
    <table class="table">
        <thead>
            <th>Nom et prenom</th>
            <th>Email</th>
            <th></th>
        </thead>
        @foreach($confirmatedParticipants as $participant)
            <tbody>
                <td>{{ $participant->name }}</td>
                <td>{{ $participant->email }}</td>
                <td>
                    <button type="submit"
                    onclick="confirm('Etes vous sure de vouloir supprimer ?') || event.stopImmediatePropagation()"
                    wire:click.prevent="removeParticipant({{ $participant->id }})"
                    class="btn btn-danger btn-sm">Supprimer</button>
                </td>
                <!-- onclick="return confirm('Etes vous sure de vouloir supprimer ?')" -->
            </tbody>
        @endforeach
    </table>
</div>
