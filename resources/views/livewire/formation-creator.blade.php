<form wire:submit.prevent="store" enctype="multipart/form-data" class="m-0 grid grid-cols-12 gap-4 bg-white shadow-sm rounded-sm p-6">
    @csrf
    <x-input type="text" fieldName="title" name="title" label="Titre de la formation" class="col-span-9"/>
    <x-input type="number" min="1" fieldName="price" name="price" label="Prix de la formation" class="col-span-3"/>
    <x-input type="file" fieldName="img" name="img" label="Miniature de la formation" class="col-span-full"/>
    <div class="col-span-full">
        <x-select fieldName="status" name="status" width="full">
            <option value="draft" selected>Brouillon</option>
            <option value="published">Publié</option>
        </x-select>
    </div>
    <div class="col-span-full" wire:ignore>
        <div id="editor" class="bg-gray-50 h-[40vh]">
            @php
                echo html_entity_decode(old('description'));
            @endphp
        </div>
    </div>
    <textarea name="description" id="hidden-textarea" cols="30" rows="10" class="hidden"></textarea>
    @if ($errors->has('description'))
        <div class="col-span-full text-red-500">
            {{ $errors->first('description') }}
        </div>
    @endif

    <div class="col-span-full">
        @foreach ($chapters as $i => $chapter)
            <div class="p-4 bg-gray-50 rounded-sm grid grid-cols-12 gap-4">
                <div class="col-span-full">
                    <h2>Chapite {{ $i + 1 }}</h2>
                </div>
                <div class="relative w-full mt-1.5 col-span-full">
                    <label for="chapters[{{$i}}][title]" class="block absolute -top-2.5 left-4 z-10 px-1 text-xs text-gray-500 select-none bg-gray-50">Titre du chapitre</label>
                    <input type="text" wire:model="chapters.{{$i}}.title" id="chapters[{{$i}}][title]" class="w-full px-3 py-2.5 text-sm border-[0.5px] bg-transparent rounded-sm border-gray-300 outline-none focus:border-black transition-all @error('chapters.'.$i.'.title') border-red-400 @enderror" autocomplete="off">
                    @error('chapters.'.$i.'.title')<div class="mt-2 text-red-400 text-sm">{{ $message }}</div>@enderror
                </div>
                <div class="col-span-full" wire:ignore>
                    <div id="editor[{{$i}}][title]" class="bg-gray-50 h-[30vh]">
                        @php
                            echo html_entity_decode(old('description'));
                        @endphp
                    </div>
                </div>
            </div>
        @endforeach
        <x-datatable-button label="Ajouter un chapitre" wire:click="addChapter" class="mt-4"/>
    </div>

    <div class="col-span-full flex flex-row-reverse">
        <x-datatable-button label="Enregistrer" />
    </div>
    
</form>