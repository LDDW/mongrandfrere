<div class="grid grid-cols-12 gap-4">
    @foreach ($files as $i => $file )
        {{-- <x-input type="text" fieldName="files[{{ $i }}][name]" name="files[{{ $i }}][name]" label="Nom du fichier" class="col-span-6" /> --}}
        <x-input type="file" fieldName="files[{{ $i }}][file]" name="files[{{ $i }}][file]" label="Fichier" class="col-span-6" />
    @endforeach
    <div class="col-span-full">
        <x-datatable-button type="button" label="Ajouter un fichier" wire:click="addFile"  />
    </div>
</div>
