<x-datatable>
    <x-slot name="header">
        <x-select fieldName="paginate" wire:model="paginate" width="16">
            <option value="{{ $paginate }}">{{ $paginate }}</option>
            @foreach ($paginates as $p)
                @if ($paginate !== $p)
                    <option value="{{ $p }}">{{ $p }}</option>
                @endif
            @endforeach
        </x-select>
        <x-datatable-search wire:model.debounce.500ms="search" placeholder="Rechercher un article"/>
        <div class="w-16"></div>
    </x-slot>
    @if (count($users) > 0)
        <x-slot name="thead">
            <th class="w-96 text-left">NOM ET PRÉNOM</th>
            <th class="w-72 text-left">E-MAIL</th>
            <th class="w-96 text-left">NOMBRE DE FORMATION ACHETÉE</th>
            <th class="w-72 text-left">DATE CRÉATION DU COMPTE</th>
        </x-slot>
        <x-slot name="tbody">
            @foreach ($users as $i => $user)
                <tr class="h-12 {{$i % 2 == 0 ? 'bg-gray-50' :''}} border-t border-gray-200 text-gray-900 flex flex-row">
                    <td class="w-96"><p class="truncate">{{ $user->lastname .' '. $user->firstname }}</p></td>
                    <td class="w-72"><p class="truncate">{{ $user->email }}</p></td>
                    <td class="w-96"><p class="truncate">{{ $user->order_count }}</p></td>
                    <td class="w-72"><p class="truncate">{{ $user->created_at }}</p></td>
                    <td class="w-full min-w-[128px] pl-2 h-12 flex items-center gap-2">

                        <a href="{{ Route('admin.user', ['user' => $user->id]) }}">
                            <button class="text-gray-100 flex items-center justify-center w-12 h-8 rounded-sm bg-green-400 hover:bg-green-500" >
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>                          
                            </button>
                        </a>

                    </td>
                </tr>
            @endforeach
        </x-slot>
    @endif
    <x-slot name="noResult">
        @if (count($users) === 0)
            <div class="h-[50vh] w-full flex items-center justify-center text-xl"><p>Aucun résultat</p></div>
        @endif
    </x-slot>
    <x-slot name="pages">
        @if($users->lastPage() > 1)<div class="paginate_bar">{{ $users->links() }}</div>@endif
    </x-slot>
</x-datatable>