<div>
    <h1>Atualizar Foto Perfil</h1>
    <form method="POST" action="#"  wire:submit.prevent="storagePhoto">
        <input type="file" name="photo" id="photo" wire:model="photo">
        @error('photo'){{ $message }}@enderror
        <button type="submit" class="btn btn-primary">Upload</button>
    </form>
</div>
