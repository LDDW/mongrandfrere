<x-admin-layout>

    <x-slot name="css">
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    </x-slot>

    <a href="{{ Route('admin.formation.edit', ['formation' => $formation->id]) }}" class="flex items-center gap-3 mb-8">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>
        <span>Retour</span>
    </a>

    <h2 class="font-bold text-3xl mb-8">Créer un nouveau chapitre</h2>

    <form action="{{ Route('admin.formation.chapter.store', ['formation' => $formation->id]) }}" enctype="multipart/form-data" method="post" class="m-0 grid grid-cols-12 gap-4 bg-white shadow-sm rounded-sm p-6">
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
        {{-- title --}}
        <x-input type="text" fieldName="title" name="title" label="Titre du chapitre" class="col-span-full"/>
        
        {{-- content --}}
        <div class="col-span-full ">
            <div id="editor" class="bg-gray-50 h-[40vh]">
                @php
                    echo html_entity_decode(old('content'));
                @endphp
            </div>
        </div>
        <textarea name="content" id="hidden-textarea" cols="30" rows="10" class="hidden"></textarea>

        {{-- files --}}
        <h2 class="text-lg">Fichiers</h2>
        <div class="col-span-full">
            @livewire('chapter-form')
        </div>

        {{-- submit --}}
        <div class="col-span-full flex flex-row-reverse">
            <x-datatable-button type="submit" label="Créer le chapitre" />
        </div>
    </form>

    @push('scripts')
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
            placeholder: 'Écrivez le contenu du chapitre ici...',
            readOnly: false,
            theme: 'snow'
        });
        // add event listener on #editor to update textarea 
        quill.on('text-change', function(delta, oldDelta, source) {
            document.getElementById("hidden-textarea").value = quill.root.innerHTML;
        });
    </script>
@endpush
</x-admin-layout>