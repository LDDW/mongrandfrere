<div {{ $attributes->merge(['class' => 'border border-gray-200 h-min bg-white shadow-sm rounded-sm overflow-hidden']) }}>
    @if (isset($header))
        <div class="border-b border-gray-200 font-normal flex gap-3 justify-between w-full p-3 shrink-0 text-gray-700">
            {{ $header }}
        </div>
    @endif
    <table class="table">
        @if (isset($thead))
            <thead class="uppercase">
                <tr class="h-12 flex flex-row min-w-max text-gray-700">
                    {{ $thead }}
                    <th class="w-full min-w-[128px] h-12 flex items-center pl-4 font-semibold">ACTIONS</th>
                </tr>
            </thead>
        @endif
        @if (isset($tbody))
            <tbody class="flex flex-col min-w-max">
                {{ $tbody }}
            </tbody>
        @endif
    </table>
    @if (isset($noResult))
        {{ $noResult }}
    @endif
    @if (isset($pages))
        {{ $pages }}
    @endif
</div>