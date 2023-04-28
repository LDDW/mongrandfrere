@php
    switch ($attributes->get('color')) {
        case 'blue':
            $color = 'bg-blue-500 hover:bg-blue-600 text-white';
            break;

        case 'red':
            $color = 'bg-red-400 hover:bg-red-500 text-white';
            break;

        case 'gray':
            $color = 'bg-slate-600 hover:bg-slate-700 text-white';
            break;

        case 'gray-light':
            $color = 'bg-gray-200 hover:bg-gray-300';
            break;
        
        case 'gray-red':
            $color = 'bg-slate-600 hover:bg-red-400 text-white';
            break;

        case 'green':
            $color = 'bg-green-400 hover:bg-green-500 text-white';
            break;
        
        default:
            $color = 'bg-blue-500 hover:bg-blue-600 text-white';
            break;
    }
@endphp

<button {{ $attributes->merge(['class' => "block rounded-sm px-4 min-w-fit h-10 text-[13px] font-semibold shadow-sm $color"]) }}>{{ $label }}</button>