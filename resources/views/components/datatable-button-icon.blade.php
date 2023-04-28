@php
    switch ($attributes->get('color')) {
        case 'blue':
            $color = 'bg-blue-500 hover:bg-blue-600';
            break;

        case 'red':
            $color = 'bg-red-400 hover:bg-red-500';
            break;

        case 'orange':
            $color = 'bg-orange-400 hover:bg-orange-500';
            break;

        case 'green':
            $color = 'bg-green-400 hover:bg-green-500';
            break;
        
        default:
            $color = 'bg-blue-500 hover:bg-blue-600';
            break;
    }
@endphp

<button {{ $attributes->merge(["class" => "text-gray-100 flex items-center justify-center w-12 h-8 rounded-sm $color"]) }} >
    <i class='bx {{ $icon }} text-lg'></i>
</button>