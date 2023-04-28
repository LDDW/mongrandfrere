<x-admin-layout>

    {{-- header --}}
    <a href="{{ Route('admin.users') }}" class="flex items-center gap-3 mb-8">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
            <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
        </svg>
        <span>Retour</span>
    </a>
    {{-- main content --}}
    <h2 class="font-bold text-3xl mb-8">Informations sur l'utilisateur</h2>
    <div class="bg-white rounded-sm p-6 shadow-sm">
        {{ $user->lastname . ' ' . $user->firstname }}
        {{ $user->email }}
        <h3 class="text-xl font-semibold mt-5 mb-3">Formations achetées</h3>
        <div class="bg-gray-50 w-full rounded-sm shadow-sm">
            @foreach ($user->order as $i => $order)
                {{ $order }}
            @endforeach
        </div>
    </div>

</x-admin-layout>