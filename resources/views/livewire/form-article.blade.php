<div>
    
    {{-- title --}}
    
    <h1 class="font-bold text-3xl mb-8">{{ $isEdit ? 'Modification d\'un article' : 'Création d\'un nouvel article' }}</h1>
    
    {{-- form --}}

    <form wire:submit.prevent="submit()" enctype="multipart/form-data" class="m-0 grid grid-cols-12 gap-4 bg-white shadow-sm rounded-sm p-6">
        @csrf
        <x-input type="text" fieldName="title" wire:model="title" label="Titre de l'article" class="col-span-full"/>
        <x-input type="file" fieldName="img" wire:model="img" wire:change="imgAsChanged()" label="Miniature de l'article" class="col-span-full"/>
        @if ($isEdit && isset($article->img_name))
            <div class="col-span-full">
                <img src="{{ asset('storage/articles/'.$article->img_name) }}" alt="Image de l'article">
            </div>
        @endif
        <div class="col-span-full">
            <x-select fieldName="status" wire:model="status" width="full">
                <option value="draft" selected>Brouillon</option>
                <option value="published">Publié</option>
            </x-select>
        </div>
        <div class="col-span-full" wire:ignore>
            <div id="editor" class="bg-gray-50 h-[40vh]">
                @php
                    echo html_entity_decode($content);
                @endphp
            </div>
        </div>
        @error("content")
            <div class="text-red-400 text-sm col-span-full">{{ $message }}</div>
        @enderror           
        
        <div class="col-span-full flex flex-row-reverse">
            <x-datatable-button type="submit" label="Enregistrer" />
        </div>

        <textarea wire:model="content" id="hidden-textarea" value="" cols="30" rows="10" class="hidden"></textarea>
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
