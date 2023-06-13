<x-admin-layout>

    <div class="flex items-center justify-between mb-4">
        <a href="{{ Route('admin.articles') }}" class="flex items-center gap-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
            <span>Retour</span>
        </a>
        <div class="flex items-center gap-4">
            @if ($article->status === 'draft')
                <form action="{{ Route('admin.article.publish', ['article' => $article->id]) }}" method="post">
                    @csrf
                    <x-datatable-button label="Publié l'article"/>
                </form>
            @endif
            <a href="{{ Route('admin.article.edit', ['article' => $article->id]) }}"><x-datatable-button label="Éditer" color="gray"/></a>
            <form action="{{ Route('admin.article.destroy', ['article' => $article->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <x-datatable-button label="Supprimer" color="gray-red" />
            </form>
        </div>
    </div>

    <div class="bg-white rounded-sm p-6 shadow-sm">
        <img src="{{ asset('storage/articles/'.$article->img_name) }}" alt="Mon image">
        {{ $article->img_name }}<br/>
        {{ $article->id }}<br/>
        {{ $article->title }}<br/>
        {{-- /Users/benjamin/Documents/VSCODE/mongrandfrereV2/public/storage/images/articles/f63N4DdkUK3oNZiZoflfPP7KocBF6BHFP1dJmVG6.png --}}
        {{-- '../../public/storage/images/articles/'.$article->img_name --}}
        http://127.0.0.1:8000/storage/articles/Capture_d’écran_2023-06-12_à_18.18.48.png
        http://127.0.0.1:8000/storage/articles/Capture_d%E2%80%99%C3%A9cran_2023-06-12_%C3%A0_18.18.48.png
        @php
            echo html_entity_decode($article->content);
        @endphp
    
        {{ $article->status }}<br/>
        {{ $article->created_at }}<br/>
        {{ $article->updated_at }}<br/>
    </div>

</x-admin-layout>