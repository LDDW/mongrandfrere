<x-app-layout>

    {{-- SEO --}}
    @section('pageTitle') {{ $formation->title }} @endsection
    @section('pageDescription') {{ strip_tags($formation->content) }} @endsection
    
    <section class="bg-white article p-6 max-w-5xl" data-aos="zoom-in-up">
        @php
            if (isset(auth()->user()->order)){
                $isFormationPaid = auth()->user()->order->contains(function ($order) use ($formation) {
                    return $order->formation_id === $formation->id && $order->status === 'paid';
                });
            }
        @endphp
        <img src="{{ asset('storage/formations/'.$formation->img_name) }}" alt="Image de la formation nommé : {{ $formation->title }}" class="aspect-square w-full h-60 bg-gray-50" data-aos="zoom-in-up" data-aos-delay="100">
        <h1 data-aos="zoom-in-up" data-aos-delay="200">{{ $formation->title }}</h1>
        @if (isset($isFormationPaid))
            <h2>Fichier de la formation</h2>
            @foreach ($formation->file as $file)
                <a href="{{ Route('download', ['file' => $file->id]) }}" class="bg-[#57C5B6] text-white flex items-center justify-between rounded-xl py-3 px-4">
                    <p class="truncate">{{ $file->file_name }}</p>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5M16.5 12L12 16.5m0 0L7.5 12m4.5 4.5V3" />
                    </svg>
                </a>
            @endforeach
        @else
            <p>{{ $formation->price }}€</p>
            <form action="{{ Route('checkout', ['formation' => $formation->id]) }}" method="POST" class="bg-white article left-0">
                @csrf
                <x-datatable-button label="Acheter la formation" color="mgf" class="w-full"/>
            </form>
        @endif
        <div data-aos="zoom-in-up" data-aos-delay="300">
            @php
                echo html_entity_decode($formation->content);
            @endphp
        </div>
    </section>

    @if(count($randomFormation) > 0)
        <section>
            <h2 class="text-2xl mb-10 font-semibold" data-aos="zoom-in-up">Les <span class="text-[#57C5B6]">autres</span>  formations</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10 relative">
                <div class="absolute w-full h-full -z-10 opacity-20 bg_icon"></div>
                @foreach ($randomFormation as $article)
                    @php
                        if (isset(auth()->user()->order)) {
                            $isRandomFormationPaid = auth()->user()->order->contains(function ($order) use ($formation) {
                                return $order->formation_id === $formation->id && $order->status === 'paid';
                            });
                        }
                    @endphp
                    <a href="{{ Route('formation', ['formation' => $article->id]) }}" data-aos="zoom-in-up" class="grid grid-cols-1 gap-4">
                        <img src="{{ asset('storage/formations/'.$article->img_name) }}" alt="Image de l'article nommé : {{ $article->title }}" class="aspect-square bg-gray-50 rounded-xl">
                        <div class="flex items-center justify-between">
                            <h3 class="text-xl font-semibold truncate">{{ $article->title }}</h3>
                            @if (!$isRandomFormationPaid)
                                <p>{{ $article->price }}€</p>
                            @endif
                        </div>
                    </a>
                @endforeach
            </div>
        </section>
    @endif

</x-app-layout>