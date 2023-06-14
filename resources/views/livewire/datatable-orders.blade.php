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
    @if (count($orders) > 0)
        <x-slot name="thead">
            <th class="w-32 text-left select-none">MONTANT</th>
            <th class="w-60 text-left select-none flex justify-between pr-4 cursor-pointer" wire:click="dateAsc">
                <span>DATE</span>
                @if ($dateAsc)
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 15.75l7.5-7.5 7.5 7.5" />
                    </svg>
                @else
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                    </svg>
                @endif
            </th>
            <th class="w-96 text-left select-none">FORMATION</th>
            <th class="w-96 text-left select-none">UTILISATEUR</th>
            <th class="w-60 text-left select-none">STATUS</th>
        </x-slot>
        <x-slot name="tbody">
            @foreach ($orders as $i => $order)
                <tr class="h-12 {{$i % 2 == 0 ? 'bg-gray-50' :''}} border-t border-gray-200 text-gray-900 flex flex-row">
                    <td class="w-32"><p class="truncate">{{ $order->formation->price }} €</p></td>
                    <td class="w-60"><p class="truncate">{{ $order->created_at }}</p></td>
                    <td class="w-96"><p class="truncate">{{ $order->formation->title }}</p></td>
                    <td class="w-96"><p class="truncate">{{ $order->user->email }}</p></td>
                    <td class="w-60"><p class="truncate">{{ $order->status === 'paid' ? 'Payé' : 'Impayé' }}</p></td>
                    <td class="w-full min-w-[128px] pl-2 h-12 flex items-center gap-2"></td>
                </tr>
            @endforeach
        </x-slot>
    @endif
    <x-slot name="noResult">
        @if (count($orders) === 0)
            <div class="h-[50vh] w-full flex items-center justify-center text-xl"><p>Aucun résultat</p></div>
        @endif
    </x-slot>
    <x-slot name="pages">
        @if($orders->lastPage() > 1)<div class="paginate_bar">{{ $orders->links() }}</div>@endif
    </x-slot>
</x-datatable>