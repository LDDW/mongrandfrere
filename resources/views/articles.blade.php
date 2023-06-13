<x-app-layout>
    @push('styles')
        @vite(['resources/css/glide.core.min.css'])
    @endpush

    <section>
        <h2 class="text-2xl mb-10 font-semibold" data-aos="zoom-in-up">Les <span class="text-[#57C5B6]">derniers</span> articles</h2>
        <div class="glide relative max-w-5xl mx-auto">
            {{-- slide --}}
            <div data-glide-el="track" class="glide__track">
              <ul class="glide__slides">
                @foreach ($latestArticles as $article)
                    <li class="glide__slide px-8">
                        <a href="{{ Route('article', ['article' => $article->id]) }}">
                            <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                                <img src="{{ asset('storage/articles/'.$article->img_name) }}" alt="Image de l'article nommé : {{ $article->title }}" class="aspect-square md:col-span-1 bg-gray-50 rounded-xl" data-aos="zoom-in-up">
                                <div class="md:col-span-2" data-aos="zoom-in-up" data-aos-delay="100">
                                    <h2 class="text-xl mb-2 font-semibold truncate">{{ $article->title }}</h2>
                                    <p class="h-36 md:h-36 lg:h-[220px] overflow-hidden text-justify">{{ strip_tags($article->content) }}</p>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
              </ul>
            </div>
            {{-- arrows --}}
            <div class="glide__arrows" data-glide-el="controls">
                <button class="glide__arrow glide__arrow--left absolute top-1/2 -translate-y-1/2 -left-1 md:-left-4 lg:-left-6 text-[#57C5B6]" data-glide-dir="<">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5L8.25 12l7.5-7.5" />
                    </svg>                  
                </button>
                <button class="glide__arrow glide__arrow--right absolute top-1/2 -translate-y-1/2 -right-1 md:-right-4 lg:-right-6 text-[#57C5B6]" data-glide-dir=">">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-7 h-7">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                    </svg>                  
                </button>
            </div>
        </div>
    </section>

    <section>
        <h2 class="text-2xl mb-10 font-semibold" data-aos="zoom-in-up"><span class="text-[#57C5B6]">Tous</span> nos articles</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 relative">
            <div class="absolute w-full h-full -z-10 opacity-20 bg_icon"></div>
            @foreach ($articles as $article)
                <a href="{{ Route('article', ['article' => $article->id]) }}" data-aos="zoom-in-up" class="grid grid-cols-1 gap-4">
                    <img src="{{ asset('storage/articles/'.$article->img_name) }}" alt="Image de l'article nommé : {{ $article->title }}" class="aspect-square bg-gray-50 rounded-xl">
                    <h3 class="text-xl font-semibold truncate mb-2">{{ $article->title }}</h3>
                </a>
            @endforeach
        </div>
    </section>
    
    @push('scripts')
        @vite(['resources/js/glide.conf.js'])
    @endpush

</x-app-layout>