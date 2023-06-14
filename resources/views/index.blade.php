<x-app-layout>
    @section('pageTitle') Accueil @endsection
    @section('pageDescription') Mon Grand Frère est une entreprise spécialisé dans l'accompagnement des étudiants et des professionnels dans la recherche d'un emploi, d'un stage ou d'une alternance. Nous leur offront différents services pour atteindre leurs objectifs professionnels. @endsection
    @section('googleBot') <meta name="google-site-verification" content="{{ config('app.google_bot_id') }}" /> @endsection

    @include('cookie-consent::index')
    <section>
        <div data-aos="zoom-in-up" class="md:max-w-lg md:mx-auto lg:grid lg:grid-cols-2 lg:max-w-4xl">
            <img src="/img/home_img_1.webp" alt="" class="w-4/5 mx-auto lg:w-full">
            <div class="bg-white p-4 rounded-xl w-4/5 mx-auto lg:h-min lg:my-auto">
                <h1 class="text-lg lg:text-3xl font-medium mb-2">“Mon Grand Frère, ton coach emploi qui t'accompagne pour ta recherche <span class="text-[#57C5B6] font-bold">d'emploi</span>, <span class="text-[#57C5B6] font-bold">stage</span> ou une <span class="text-[#57C5B6] font-bold">alternance</span> !”</h1>
                <i class="flex justify-end text-xs">Hugo et Kévin, coach recherche emploi</i>
            </div>
        </div>

        <div class="grid grid-cols-3 gap-4 md:max-w-lg md:mx-auto lg:mt-8">
            <div class="bg-white p-3 rounded-xl text-center" data-aos="zoom-in-up" data-aos-delay="100">
                <svg width="40" height="40" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-3">
                    <path d="M7.80001 15.1C7.64088 15.1 7.48827 15.0368 7.37575 14.9243C7.26323 14.8118 7.20001 14.6591 7.20001 14.5C7.20001 14.3409 7.26323 14.1883 7.37575 14.0757C7.48827 13.9632 7.64088 13.9 7.80001 13.9H16.2C16.3591 13.9 16.5118 13.9632 16.6243 14.0757C16.7368 14.1883 16.8 14.3409 16.8 14.5C16.8 14.6591 16.7368 14.8118 16.6243 14.9243C16.5118 15.0368 16.3591 15.1 16.2 15.1H7.80001ZM7.80001 18.1C7.64088 18.1 7.48827 18.0368 7.37575 17.9243C7.26323 17.8118 7.20001 17.6591 7.20001 17.5C7.20001 17.3409 7.26323 17.1883 7.37575 17.0757C7.48827 16.9632 7.64088 16.9 7.80001 16.9H16.2C16.3591 16.9 16.5118 16.9632 16.6243 17.0757C16.7368 17.1883 16.8 17.3409 16.8 17.5C16.8 17.6591 16.7368 17.8118 16.6243 17.9243C16.5118 18.0368 16.3591 18.1 16.2 18.1H7.80001Z" fill="#57C5B6"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.422 1.3H5.40001C4.92262 1.3 4.46478 1.48965 4.12721 1.82721C3.78965 2.16478 3.60001 2.62261 3.60001 3.1V21.1C3.60001 21.5774 3.78965 22.0352 4.12721 22.3728C4.46478 22.7104 4.92262 22.9 5.40001 22.9H18.6C19.0774 22.9 19.5352 22.7104 19.8728 22.3728C20.2104 22.0352 20.4 21.5774 20.4 21.1V8.7424C20.3999 8.29177 20.2307 7.85757 19.926 7.5256L14.7492 1.8832C14.5805 1.6993 14.3754 1.55248 14.1469 1.45208C13.9184 1.35169 13.6716 1.2999 13.422 1.3ZM4.80001 3.1C4.80001 2.94087 4.86322 2.78826 4.97574 2.67574C5.08826 2.56322 5.24088 2.5 5.40001 2.5H13.422C13.5053 2.49991 13.5876 2.51715 13.6639 2.55062C13.7401 2.58408 13.8085 2.63305 13.8648 2.6944L19.0416 8.3368C19.1433 8.4474 19.1999 8.59214 19.2 8.7424V21.1C19.2 21.2591 19.1368 21.4117 19.0243 21.5243C18.9117 21.6368 18.7591 21.7 18.6 21.7H5.40001C5.24088 21.7 5.08826 21.6368 4.97574 21.5243C4.86322 21.4117 4.80001 21.2591 4.80001 21.1V3.1Z" fill="#57C5B6"/>
                    <path d="M13.8 2.62001V8.26001H19.44" stroke="#57C5B6" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M9.7608 7.4596C9.93216 7.46485 10.1028 7.43563 10.2627 7.37367C10.4225 7.31172 10.5683 7.21829 10.6914 7.09893C10.8145 6.97957 10.9123 6.83671 10.9791 6.67883C11.046 6.52094 11.0804 6.35124 11.0804 6.1798C11.0804 6.00836 11.046 5.83866 10.9791 5.68077C10.9123 5.52289 10.8145 5.38003 10.6914 5.26067C10.5683 5.14131 10.4225 5.04788 10.2627 4.98593C10.1028 4.92397 9.93216 4.89475 9.7608 4.9C9.42816 4.91019 9.11255 5.04949 8.88086 5.28838C8.64917 5.52728 8.51959 5.847 8.51959 6.1798C8.51959 6.5126 8.64917 6.83232 8.88086 7.07121C9.11255 7.31011 9.42816 7.44941 9.7608 7.4596Z" fill="#57C5B6"/>
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.3192 10.2328C12.3192 8.87201 11.1732 7.88681 9.75961 7.88681C8.34601 7.88681 7.20001 8.87081 7.20001 10.2328V10.8736C7.20033 10.9867 7.24548 11.0951 7.32556 11.1749C7.40564 11.2548 7.51412 11.2996 7.62721 11.2996H11.8932C12.0061 11.2993 12.1143 11.2543 12.1941 11.1745C12.2739 11.0947 12.3189 10.9865 12.3192 10.8736V10.2328Z" fill="#57C5B6"/>
                </svg>
                <p class="text-sm">Aide à la construction d'un CV</p>
            </div>

            <div class="bg-white p-3 rounded-xl text-center" data-aos="zoom-in-up" data-aos-delay="200">
                <svg width="40" height="40" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-3">
                    <path d="M2 22.1C2 19.9783 2.84285 17.9434 4.34315 16.4432C5.84344 14.9429 7.87827 14.1 10 14.1C12.1217 14.1 14.1566 14.9429 15.6569 16.4432C17.1571 17.9434 18 19.9783 18 22.1H16C16 20.5087 15.3679 18.9826 14.2426 17.8574C13.1174 16.7321 11.5913 16.1 10 16.1C8.4087 16.1 6.88258 16.7321 5.75736 17.8574C4.63214 18.9826 4 20.5087 4 22.1H2ZM10 13.1C6.685 13.1 4 10.415 4 7.10001C4 3.78501 6.685 1.10001 10 1.10001C13.315 1.10001 16 3.78501 16 7.10001C16 10.415 13.315 13.1 10 13.1ZM10 11.1C12.21 11.1 14 9.31001 14 7.10001C14 4.89001 12.21 3.10001 10 3.10001C7.79 3.10001 6 4.89001 6 7.10001C6 9.31001 7.79 11.1 10 11.1ZM18.284 14.803C19.6893 15.4359 20.882 16.4612 21.7186 17.7557C22.5552 19.0502 23.0002 20.5587 23 22.1H21C21.0002 20.944 20.6666 19.8125 20.0391 18.8416C19.4116 17.8707 18.5171 17.1017 17.463 16.627L18.284 14.803ZM17.596 3.51301C18.6035 3.9283 19.465 4.63354 20.071 5.53924C20.6771 6.44493 21.0004 7.51025 21 8.60001C21.0004 9.97234 20.4877 11.2952 19.5625 12.3088C18.6374 13.3224 17.3667 13.9535 16 14.078V12.065C16.7409 11.9589 17.4283 11.618 17.9613 11.0925C18.4943 10.5669 18.8447 9.88433 18.9612 9.14494C19.0776 8.40555 18.954 7.6483 18.6084 6.98436C18.2628 6.32042 17.7134 5.78475 17.041 5.45601L17.596 3.51301Z" fill="#57C5B6"/>
                </svg>                
                <p class="text-sm">Préparation pour un entretien</p>
            </div>

            <div class="bg-white p-3 rounded-xl text-center" data-aos="zoom-in-up" data-aos-delay="300">
                <svg width="40" height="40" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-3">
                    <path d="M22 12.1C22 15.871 22 17.757 20.828 18.928C19.657 20.1 17.771 20.1 14 20.1H10C6.229 20.1 4.343 20.1 3.172 18.928C2 17.757 2 15.871 2 12.1C2 8.32901 2 6.44301 3.172 5.27201C4.343 4.10001 6.229 4.10001 10 4.10001H14C17.771 4.10001 19.657 4.10001 20.828 5.27201C21.482 5.92501 21.771 6.80001 21.898 8.10001" stroke="#57C5B6" stroke-width="1.5" stroke-linecap="round"/>
                    <path d="M18 8.10001L15.841 9.90001C14.005 11.43 13.086 12.195 12 12.195C11.35 12.195 10.761 11.921 10 11.375M6 8.10001L6.9 8.85001L7.8 9.60001" stroke="#57C5B6" stroke-width="1.5" stroke-linecap="round"/>
                </svg>                
                <p class="text-sm">Conception de sa lettre de motivation</p>
            </div>
        </div>
    </section>

    <section class="relative">

        <div data-aos="zoom-in-up" data-aos-delay="100">
            <img src="img/bg_el_1.webp" alt="" class="absolute right-0 top-0 md:hidden lg:block lg:-right-20 lg:-top-20 xl:-right-24">
        </div>

        <div class="md:grid md:grid-cols-2 md:gap-4">

            <div class="relative md:grid md:grid-cols-2 md:gap-4" data-aos="zoom-in-up">
                <div class="relative mb-4 w-7/12 shadow-lg rounded-3xl overflow-hidden md:w-full md:mb-0">
                    <img src="/img/home_img_2.webp" alt="" class="w-full h-full" data-aos="fade-up">
                    <div class="absolute top-4 left-4 bg-[#57C5B6]/[.8] p-2 w-4/6 rounded-xl">
                        <i class="text-white font-medium text-sm">ÉTAPE 1</i>
                        <p class="text-white font-black text-lg">DÉCOUVRIR</p>
                    </div>
                </div>
                
                <div class="w-7/12 absolute right-0 -translate-y-1/2 shadow-lg rounded-3xl overflow-hidden md:relative md:-translate-y-0 md:w-full">
                    <img src="/img/home_img_3.webp" alt="" class="w-full h-full lg:relative lg:-translate-y-0">
                    <div class="absolute top-4 left-4 bg-[#57C5B6]/[.8] p-2 w-4/6 rounded-xl" data-aos="fade-up">
                        <i class="text-white font-medium text-sm">ÉTAPE 2</i>
                        <p class="text-white font-black text-lg">CHOISIR</p>
                    </div>
                </div>
            </div>
    
            <div class="relative md:grid md:grid-cols-2 md:gap-4" data-aos="zoom-in-up">
                <div class="relative mb-4 w-7/12 shadow-lg rounded-3xl overflow-hidden md:w-full md:mb-0">
                    <img src="/img/home_img_4.webp" alt="" class="w-full h-full">
                    <div class="absolute top-4 left-4 bg-[#57C5B6]/[.8] p-2 w-4/6 rounded-xl" data-aos="fade-up">
                        <i class="text-white font-medium text-sm">ÉTAPE 3</i>
                        <p class="text-white font-black text-lg">APPRENDRE</p>
                    </div>
                </div>

                <div class="w-7/12 absolute right-0 -translate-y-1/2 shadow-lg rounded-3xl overflow-hidden md:relative md:-translate-y-0 md:w-full">
                    <img src="/img/home_img_5.webp" alt="" class="w-full h-full">
                    <div class="absolute top-4 left-4 bg-[#57C5B6]/[.8] p-2 w-4/6 rounded-xl" data-aos="fade-up">
                        <i class="text-white font-medium text-sm">ÉTAPE 4</i>
                        <p class="text-white font-black text-lg">SIGNER</p>
                    </div>
                </div>
            </div>

        </div>

        <div data-aos="zoom-in-up" data-aos-delay="100">
            <img src="img/bg_el_1.webp" alt="" class="absolute bottom-0 left-0 rotate-180 hidden lg:block lg:-bottom-20 lg:-left-20 xl:-left-24">
        </div>
        
    </section>

    <section class="grid grid-cols-1 md:grid-cols-2 md:grid-rows-3">
        <div class="z-10 md:row-span-3 md:flex md:flex-col md:justify-end" data-aos="zoom-in-up">
            <img src="/img/home_img_6.webp" alt="" class="w-4/6 md:max-w-xs md:mx-auto">
            <div class="bg-[#57C5B6] p-4 rounded-xl text-white">
                <p class="font-medium"><span class="block text-4xl font-bold">6</span>ans d'expérience dans la formation</p>
            </div>
        </div>
        <div class="bg-white p-4 rounded-xl text-[#57C5B6]" data-aos="zoom-in-up" data-aos-delay="100">
            <p class="font-medium"><span class="block text-4xl font-bold">+300</span>étudiants formés</p>
        </div>
        <div class="bg-[#57C5B6] p-4 rounded-xl text-white" data-aos="zoom-in-up" data-aos-delay="200">
            <p class="font-medium"><span class="block text-4xl font-bold">90%</span>d'entre eux sont des étrangers</p>
        </div>
        <div class="bg-white p-4 rounded-xl text-[#57C5B6]" data-aos="zoom-in-up" data-aos-delay="300">
            <p class="font-medium"><span class="block text-4xl font-bold">96%</span>de taux de réussite</p>
        </div>
    </section>

    <section class="md:max-w-2xl md:mx-auto relative">

        <div data-aos="zoom-in-up" data-aos-delay="100">
            <img src="img/bg_el_1.webp" alt="" class="absolute right-0 top-0 md:hidden lg:block lg:-right-24 lg:-top-20">
        </div>

        <div class="relative bg-[#57C5B6] rounded-xl overflow-hidden" data-aos="zoom-in-up">
            <div class="absolute w-full h-full -z-10 opacity-20 bg_icon"></div>
            <div class="p-6">
                <h2 class="text-center text-white font-bold mb-4 text-lg">Une dernière question ?</h2>
                <p class="text-white text-center drop-shadow-sm">Contactez-nous dès maintenant pour voir ensemble vos besoins et vous accompagner au mieux dans votre démarche.</p>
                <a href="{{ Route('contact') }}" class="mt-4 block text-center">
                    <button class="py-2.5 px-4 bg-white rounded-xl">Contactez-nous !</button>
                </a>
            </div>
        </div>
    </section>

</x-app-layout>