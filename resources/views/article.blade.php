<x-app-layout>
    @section('pageTitle') {{ $article->title }} @endsection
    @section('pageDescription') {{ strip_tags($article->content) }} @endsection

    <section class="bg-white article p-6 max-w-5xl" data-aos="zoom-in-up">
        <img src="{{ asset('storage/articles/'.$article->img_name) }}" alt="Image de l'article nommé : {{ $article->title }}" class="aspect-square w-full h-60 bg-gray-50" data-aos="zoom-in-up" data-aos-delay="100">
        <h1 data-aos="zoom-in-up" data-aos-delay="200">{{ $article->title }}</h1>
        <div data-aos="zoom-in-up" data-aos-delay="300">
            @php
                echo html_entity_decode($article->content);
            @endphp
        </div>
        <time datetime="{{ $article->created_at }}">Date de publication : {{ $article->created_at->format('d/m/Y') }}</time>
    </section>

    <section>
        <h2 class="text-2xl mb-10 font-semibold" data-aos="zoom-in-up">Nos <span class="text-[#57C5B6]">derniers</span>  articles</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 relative">
            <div class="absolute w-full h-full -z-10 opacity-20 bg_icon"></div>
            @foreach ($latestArticles as $article)
                <a href="{{ Route('article', ['article' => $article->id]) }}" data-aos="zoom-in-up" class="grid grid-cols-1 gap-4">
                    <img src="{{ asset('storage/articles/'.$article->img_name) }}" alt="Image de l'article nommé : {{ $article->title }}" class="aspect-square bg-gray-50 rounded-xl">
                    <h3 class="text-xl font-semibold truncate mb-2">{{ $article->title }}</h3>
                </a>
            @endforeach
        </div>
    </section>

</x-app-layout>