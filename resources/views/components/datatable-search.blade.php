<div {{ $attributes->merge(['class' => 'w-1/3 min-w-[350px] bg-gray-100 rounded-sm overflow-hidden flex items-center shrink-0']) }}>
    <div class="w-10 h-10 flex items-center justify-center">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-4 h-4 text-gray-400">
            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
          </svg>
          
    </div>
    <input 
        @if ($attributes->get('wire:model'))
            wire:model="{{ $attributes->get('wire:model') }}"
        @endif

        type="text" 
        placeholder="{{ $placeholder }}" 
        class="bg-transparent w-[calc(100%-48px)] text-sm h-10 outline-none border-0 outline-none"
    >
</div>