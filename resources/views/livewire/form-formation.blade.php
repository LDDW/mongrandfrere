<div>

    {{-- title --}}
    
    <h1 class="font-bold text-3xl mb-8">{{ $isEdit ? 'Modification d\'une formation' : 'Création d\'une nouvel formation' }}</h1>

    <form wire:submit.prevent="submit()" enctype="multipart/form-data" class="m-0 grid grid-cols-12 gap-4 bg-white shadow-sm rounded-sm p-6">
        @csrf
        @if ($errors->any())
            <div class="col-span-full">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <ul class="space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <x-input type="text" fieldName="title" wire:model="title" label="Titre de la formation" class="col-span-9"/>
        <x-input type="number" min="1" fieldName="price" wire:model="price" label="Prix de la formation" class="col-span-3"/>
        <x-input type="file" fieldName="img" wire:model="img" label="Miniature de la formation" class="col-span-full"/>
        @if ($isEdit && isset($formation->img_name))
            <div class="col-span-full">
                <img src="{{ asset('storage/formations/'.$formation->img_name) }}" alt="Image de l'article">
            </div>
        @endif

        <div class="col-span-full">
            <x-select fieldName="status" wire:model="status" width="full">
                <option value="draft" selected>Brouillon</option>
                <option value="published">Publié</option>
            </x-select>
        </div>

        <div class="col-span-full" wire:ignore>
            <div id="editor" class="bg-gray-50 h-[60vh]">
                @php
                    echo html_entity_decode($content);
                @endphp
            </div>
        </div>
        @if ($errors->has('description'))
            <div class="col-span-full text-red-500">
                {{ $errors->first('description') }}
            </div>
        @endif
        <textarea wire:model="content" id="hidden-textarea" cols="30" rows="10" class="hidden"></textarea>

        <div class="grid grid-cols-12 gap-4 col-span-full">
            @foreach ($files as $i => $file )  
                @if ($file['id'] !== null)
                    <div class="relative col-span-10 mt-1.5">
                        <label for="files[{{$i}}][file_name]" class="block absolute -top-2.5 left-4 z-10 px-1 text-xs text-gray-500 select-none bg-white">Nom du fichier</label>
                        <input type="text" wire:model="files.{{$i}}.file_name" id="files[{{$i}}][file_name]" class="w-full px-3 py-2.5 text-sm border-[0.5px] rounded-sm bg-white border-gray-300 outline-none focus:border-black transition-all @error('files.'.$i.'.file_name') border-red-400 @enderror" autocomplete="off">
                        @error('files.'.$i.'.file_name')<div class="mt-2 text-red-400 text-sm">{{ $message }}</div>@enderror
                    </div>
                @else
                    <div class="relative col-span-5 mt-1.5">
                        <label for="files[{{$i}}][file_name]" class="block absolute -top-2.5 left-4 z-10 px-1 text-xs text-gray-500 select-none bg-white">Nom du fichier</label>
                        <input type="text" wire:model="files.{{$i}}.file_name" id="files[{{$i}}][file_name]" class="w-full px-3 py-2.5 text-sm border-[0.5px] rounded-sm bg-white border-gray-300 outline-none focus:border-black transition-all @error('files.'.$i.'.file_name') border-red-400 @enderror" autocomplete="off">
                        @error('files.'.$i.'.file_name')<div class="mt-2 text-red-400 text-sm">{{ $message }}</div>@enderror
                    </div>
                    <div class="relative col-span-5 mt-1.5">
                        {{-- <label for="files[{{$i}}][file]" class="block absolute -top-2.5 left-4 z-10 px-1 text-xs text-gray-500 select-none bg-white">Fichier</label> --}}
                        <input type="file" wire:model="files.{{$i}}.file" id="customers[{{$i}}][firstname]" class="bg-gray-100 p-1.5 w-full rounded-sm"  autocomplete="off">
                        @error('files.'.$i.'.file')<div class="mt-2 text-red-400 text-sm">{{ $message }}</div>@enderror
                    </div>
                @endif
                
                <div class="col-span-2 mt-1.5">
                    <x-datatable-button type="button" label="Supprimer" wire:click="removeFile({{ $i }})" />
                </div>
            @endforeach
            <div class="col-span-full">
                <x-datatable-button type="button" label="Ajouter un fichier" wire:click="addFile"  />
            </div>
        </div>
    
        <div class="col-span-full flex flex-row-reverse">
            <x-datatable-button label="Enregistrer" />
        </div>
        
    </form>
    
    {{-- quill editor js --}}

    @section('js')
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <script>
            var quill = new Quill('#editor', {
                modules: {
                    toolbar: [
                        [{ 'font': [] }],                                  
                        [{ 'size': ['huge', 'large', false, 'small'] }],   
                        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],         
                        ['bold', 'italic', 'underline', 'strike'],                   
                        [{ 'list': 'ordered' }, { 'list': 'bullet' }],   
                        [{ 'color': [] }, { 'background': [] }],            
                        [{ 'align': [] }],                                 
                        ['clean', 'link']
                    ]
                },
                placeholder: 'Écrivez votre article ici...',
                readOnly: false,
                theme: 'snow'
            });
            // add event listener on #editor to update textarea 
            quill.on('text-change', function(delta, oldDelta, source) {
                @this.emit('contentUpdated', quill.root.innerHTML)
            });
        </script>
    @endsection

</div>
