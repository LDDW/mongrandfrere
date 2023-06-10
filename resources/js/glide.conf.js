import glide from '@glidejs/glide';
import {Autoplay} from '@glidejs/glide/dist/glide.modular.esm';

// init glide 
new glide('.glide', {
    type: 'slider',
    autoplay: 10000,
    focusAt: 'center',
    perView: 1,
}).mount({ Autoplay })