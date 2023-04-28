@php
    $attributeMap = [
        'wire:model' => 'wire:model',
        'name' => 'name',
    ];
@endphp

<div {{ $attributes->merge(['class']) }}>
    <div @class(['relative z-10 rounded-sm overflow-hidden text-sm bg-gray-100'])>
        <label @class(['absolute -z-10 right-2 top-1/2 -translate-y-1/2 cursor-pointer'])>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 text-gray-500">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
            </svg>
        </label>
        <select 
            @foreach ($attributeMap as $attributeName => $htmlAttributeName)
                @if ($attributes->get($attributeName))
                    {{ $htmlAttributeName }}="{{ $attributes->get($attributeName) }}"
                @endif
            @endforeach
            @class(["w-$width shrink-0 min-w-fit h-10 border border-gray-100 pl-3 bg-transparent appearance-none outline-none select-none cursor-pointer", ])
        >
        @if(isset($slot))
            {{ $slot }}
        @endif
        </select>
    </div>
    @error($fieldName)<div class="mt-2 text-red-400 text-sm">{{ $message }}</div>@enderror
</div>