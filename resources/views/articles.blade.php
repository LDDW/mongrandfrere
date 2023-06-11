<x-app-layout>
    @push('styles')
        @vite(['node_modules/@glidejs/glide/dist/css/glide.core.min.css'])
    @endpush

    <form action="{{ Route('checkout') }}" method="POST">
        @csrf
        <button type="submit">Checkout</button>
    </form>

    <section>
        <h2 class="text-2xl mb-10 font-semibold" data-aos="zoom-in-up">Les <span class="text-[#57C5B6]">derniers</span> articles</h2>
        <div class="glide relative max-w-5xl mx-auto">
            {{-- slide --}}
            <div data-glide-el="track" class="glide__track">
              <ul class="glide__slides">
                <li class="glide__slide px-8">
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                        <img src="" alt="" class="aspect-square md:col-span-1 bg-gray-50 rounded-xl" data-aos="zoom-in-up">
                        <div class="md:col-span-2" data-aos="zoom-in-up" data-aos-delay="100">
                            <h2 class="text-xl mb-2 font-semibold truncate">title</h2>
                            <p class="h-36 md:h-36 lg:h-56 overflow-hidden text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut ipsam quo minus doloribus eligendi itaque commodi voluptatem, delectus vitae vel ab distinctio eveniet corrupti consequatur atque similique. Eius, architecto ipsum?
                            Similique consequatur voluptas, molestias quas nemo atque autem dolorem, dolorum neque ullam nobis optio, repudiandae minus impedit alias suscipit dolores mollitia iure non eos ipsam possimus cumque fugit! Excepturi, voluptate.
                            Impedit vel nulla sit voluptate iure minus aliquam veniam voluptates voluptas ex? Illum dicta sint, fugiat quaerat minus itaque ipsa ea amet doloribus, excepturi rerum. Ea eveniet repellat numquam voluptatem.</p>
                        </div>
                    </div>
                </li>
                <li class="glide__slide px-8">
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                        <img src="" alt="" class="aspect-square md:col-span-1 bg-gray-50 rounded-xl">
                        <div class="md:col-span-2">
                            <h2 class="text-xl mb-2 font-semibold truncate">title</h2>
                            <p class="h-36 md:h-36 lg:h-56 overflow-hidden text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut ipsam quo minus doloribus eligendi itaque commodi voluptatem, delectus vitae vel ab distinctio eveniet corrupti consequatur atque similique. Eius, architecto ipsum?
                            Similique consequatur voluptas, molestias quas nemo atque autem dolorem, dolorum neque ullam nobis optio, repudiandae minus impedit alias suscipit dolores mollitia iure non eos ipsam possimus cumque fugit! Excepturi, voluptate.
                            Impedit vel nulla sit voluptate iure minus aliquam veniam voluptates voluptas ex? Illum dicta sint, fugiat quaerat minus itaque ipsa ea amet doloribus, excepturi rerum. Ea eveniet repellat numquam voluptatem.</p>
                        </div>
                    </div>
                </li>
                <li class="glide__slide px-8">
                    <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                        <img src="" alt="" class="aspect-square md:col-span-1 bg-gray-50 rounded-xl">
                        <div class="md:col-span-2">
                            <h2 class="text-xl mb-2 font-semibold truncate">title</h2>
                            <p class="h-36 md:h-36 lg:h-56 overflow-hidden text-justify">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut ipsam quo minus doloribus eligendi itaque commodi voluptatem, delectus vitae vel ab distinctio eveniet corrupti consequatur atque similique. Eius, architecto ipsum?
                            Similique consequatur voluptas, molestias quas nemo atque autem dolorem, dolorum neque ullam nobis optio, repudiandae minus impedit alias suscipit dolores mollitia iure non eos ipsam possimus cumque fugit! Excepturi, voluptate.
                            Impedit vel nulla sit voluptate iure minus aliquam veniam voluptates voluptas ex? Illum dicta sint, fugiat quaerat minus itaque ipsa ea amet doloribus, excepturi rerum. Ea eveniet repellat numquam voluptatem.</p>
                        </div>
                    </div>
                </li>
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
            <a href="" data-aos="zoom-in-up" class="grid grid-cols-1 gap-4">
                <img src="" alt="" class="aspect-square bg-gray-50 rounded-xl">
                <h3 class="text-xl font-semibold truncate mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur rem quidem corporis expedita. Culpa incidunt officiis nihil, aliquam ducimus debitis. Alias esse placeat libero doloribus nulla nesciunt harum dolorum illum.</h3>
            </a>
            <a href="" data-aos="zoom-in-up" data-aos-delay="100" class="grid grid-cols-1 gap-4">
                <img src="" alt="" class="aspect-square bg-gray-50 rounded-xl">
                <h3 class="text-xl font-semibold truncate mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur rem quidem corporis expedita. Culpa incidunt officiis nihil, aliquam ducimus debitis. Alias esse placeat libero doloribus nulla nesciunt harum dolorum illum.</h3>
            </a>
            <a href="" data-aos="zoom-in-up" data-aos-delay="200" class="grid grid-cols-1 gap-4">
                <img src="" alt="" class="aspect-square bg-gray-50 rounded-xl">
                <h3 class="text-xl font-semibold truncate mb-2">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur rem quidem corporis expedita. Culpa incidunt officiis nihil, aliquam ducimus debitis. Alias esse placeat libero doloribus nulla nesciunt harum dolorum illum.</h3>
            </a>
        </div>
    </section>
    
    @push('scripts')
        @vite(['resources/js/glide.conf.js'])
    @endpush

</x-app-layout>