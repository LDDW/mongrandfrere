<x-admin-layout>

    <div class="flex items-center justify-between mb-4">
        <a href="{{ Route('admin.articles') }}" class="flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
            <span>Retour</span>
        </a>
        <div class="flex items-center gap-4">
            <x-datatable-button label="Publié l'article"  />
            <x-datatable-button label="Éditer" color="gray" />
            <form action="{{ Route('admin.article.destroy', ['article' => $article->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <x-datatable-button label="Supprimer" color="gray-red" />
            </form>
        </div>
    </div>

    <div class="bg-white rounded-sm p-6 shadow-sm">
        {{ $article->id }}<br/>
        {{ $article->title }}<br/>
    
        @php
            echo html_entity_decode($article->content);
        @endphp
    
        {{ $article->status }}<br/>
        {{ $article->created_at }}<br/>
        {{ $article->updated_at }}<br/>
    </div>

</x-admin-layout>