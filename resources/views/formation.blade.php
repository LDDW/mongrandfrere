<x-app-layout>
    
    <section class="bg-white article p-6 max-w-5xl" data-aos="zoom-in-up">
        <img src="{{ asset('storage/formations/'.$formation->img_name) }}" alt="Image de la formation nommé : {{ $formation->title }}" class="aspect-square w-full h-60 bg-gray-50" data-aos="zoom-in-up" data-aos-delay="100">
        <h1 data-aos="zoom-in-up" data-aos-delay="200">{{ $formation->title }}</h1>
        <p>{{ $formation->price }}€</p>
        <form action="{{ Route('checkout', ['formation' => $formation->id]) }}" method="POST" class="bg-white article left-0">
            @csrf
            <x-datatable-button label="Acheter la formation" color="mgf" class="w-full"/>
        </form>
        <div data-aos="zoom-in-up" data-aos-delay="300">
            @php
                echo html_entity_decode($formation->content);
            @endphp
        </div>
    </section>

    <section>
        <h2 class="text-2xl mb-10 font-semibold" data-aos="zoom-in-up">Les <span class="text-[#57C5B6]">autres</span>  formations</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 relative">
            <div class="absolute w-full h-full -z-10 opacity-20 bg_icon"></div>
            @foreach ($randomFormation as $article)
                <a href="{{ Route('article', ['article' => $article->id]) }}" data-aos="zoom-in-up" class="grid grid-cols-1 gap-4">
                    <img src="{{ asset('storage/formations/'.$article->img_name) }}" alt="Image de l'article nommé : {{ $article->title }}" class="aspect-square bg-gray-50 rounded-xl">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-semibold truncate">{{ $article->title }}</h3>
                        <p>{{ $article->price }}€</p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

</x-app-layout>