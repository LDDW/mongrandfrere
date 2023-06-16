<x-app-layout>

    {{-- SEO --}}
    @section('pageTitle') Nos services @endsection
    @section('pageDescription') Découvrez nos services @endsection

    <section>        
        <div class="w-full bg-white p-4 rounded-xl" data-aos="zoom-in-up">
            <h1 class="text-[#57C5B6] text-xl uppercase font-bold mb-3">Profiter de notre formation 100% gratuite</h1>
            <p class="">Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat ipsum voluptates quae aperiam! Laborum eaque quia doloribus perferendis autem obcaecati ullam omnis itaque? Quasi impedit accusamus cumque laudantium, laborum accusantium.</p>
            <a href="" class="mt-4 block">
                <button class="py-2.5 px-4 bg-[#57C5B6] text-white rounded-xl">Je profite de la formation gratuite</button>
            </a>
        </div>
    </section>
    <section>
        <h2 class="text-2xl font-semibold"><span class="text-[#57C5B6]">Toutes</span> nos formations</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 relative">
            <div class="absolute w-full h-full -z-10 opacity-20 bg_icon"></div>
            @foreach ($formations as $formation)
                @php
                    if(count(auth()->user()->order) > 0){
                        $isFormationPaid = auth()->user()->order->contains(function ($order) use ($formation) {
                            return $order->formation_id === $formation->id && $order->status === 'paid';
                        });
                    }
                @endphp
                <a href="{{ Route('formation', ['formation' => $formation->id]) }}" data-aos="zoom-in-up">
                    <div class="bg-white p-4 rounded-xl">
                        <div class="w-full aspect-square bg-gray-300 rounded-xl overflow-hidden mb-3">
                            <img src="{{ asset('storage/formations/'.$formation->img_name) }}" alt="Image de la formation nommé : {{ $formation->title }}" class="aspect-square w-full h-full bg-gray-50">
                        </div>
                        <h3 class="text-xl font-semibold truncate mb-2">{{ $formation->title }}</h3>
                        <p class="mb-4 truncate">{{ strip_tags($formation->content) }}</p>
                        @if (isset($isFormationPaid) && $isFormationPaid)
                            <button class="py-2.5 px-4 bg-[#57C5B6] text-white rounded-xl w-full">Voir la formation</button>
                        @else
                            <div class="flex items-center justify-between">
                                <button class="py-2.5 px-4 bg-[#57C5B6] text-white rounded-xl">Voir la formation</button>
                                <p class="truncate shrink-0 text-xl">{{ $formation->price }}€</p>
                            </div>
                        @endif
                    </div>
                </a>
            @endforeach
        </div>
    </section>
</x-app-layout>