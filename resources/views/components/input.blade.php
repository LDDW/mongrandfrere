@php
    $attributeMap = [
        'min' => 'min',
        'onkeyup' => 'onkeyup',
        'pattern' => 'pattern',
        'placeholder' => 'placeholder',
        'wire:model' => 'wire:model',
        'value' => 'value',
        'name' => 'name',
        'maxlength' => 'maxlength',
        'disabled' => 'disabled',
    ];
    
    $color = $attributes->get('color') === 'gray' ? 'bg-gray-50' : 'bg-white';
@endphp

<div {{ $attributes->merge(['class' => 'relative w-full mt-1.5']) }}>
    <label for="input_{{ $fieldName }}" class="block absolute -top-2 left-4 z-10 px-1 text-xs text-gray-500 select-none {{ $color }}">{{ $label }}</label>

    <input 
        type="{{ $type }}"
        id="input_{{ $fieldName }}"
        data-field-name="{{ $fieldName }}"
        @class(["w-full px-3 py-2.5 text-sm border-[0.5px] rounded-sm border-gray-300 outline-none focus:border-black transition-all $color input_$fieldName ", "border-red-400" => $errors->has($fieldName)])
        autocomplete="off"
        @if (old($attributes->get('name')) !== null)
            value="{{ old($attributes->get('name')) }}"
        @endif
        @foreach ($attributeMap as $attributeName => $htmlAttributeName)
            @if ($attributes->get($attributeName))
                {{ $htmlAttributeName }}="{{ $attributes->get($attributeName) }}"
            @endif
        @endforeach
    >

    @error("$fieldName")
        <div id="error_{{ $fieldName }}" class="mt-2 text-red-400 text-sm">{{ $message }}</div>
    @enderror
</div>