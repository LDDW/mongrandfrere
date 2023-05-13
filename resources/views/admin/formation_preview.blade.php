<x-admin-layout>

    <div class="flex items-center justify-between mb-4">
        <a href="{{ Route('admin.formations') }}" class="flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
            <span>Retour</span>
        </a>
        <div class="flex items-center gap-4">
            @if ($formation->status === 'draft')
                <form action="{{ Route('admin.formation.publish', ['formation' => $formation->id]) }}" method="post">
                    @csrf
                    <x-datatable-button label="Publié l'article"/>
                </form>
            @endif
            <a href="{{ Route('admin.formation.edit', ['formation' => $formation->id]) }}"><x-datatable-button label="Éditer" color="gray"/></a>
            <form action="{{ Route('admin.formation.destroy', ['formation' => $formation->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <x-datatable-button label="Supprimer" color="gray-red" />
            </form>
        </div>
    </div>

    <div class="bg-white rounded-sm p-6 shadow-sm">
        @php
            echo html_entity_decode($formation->desc);
        @endphp
    
        {{ $formation }}
    </div>

</x-admin-layout>
