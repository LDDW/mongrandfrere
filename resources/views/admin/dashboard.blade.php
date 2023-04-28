<x-admin-layout>
    <div class="grid grid-cols-12 gap-4">
        <h2 class="col-span-full font-bold text-3xl">Tableau de bord</h2>
        <div class="col-span-full grid grid-cols-12 gap-4">
            <div class="z-0 relative overflow-hidden flex flex-col justify-between col-span-6 md:col-span-3 bg-white shadow-sm rounded-xl h-44 p-4 lg:p-5">
                <h3 class="text-lg lg:text-xl">Nombre de commande sur les 30 derniers jours</h3>
                <p class="text-right text-white text-sm"><span class="text-3xl lg:text-4xl font-bold">{{ $orderCountLastMounth }}</span> Commandes</p>
                <svg class="absolute -z-10 -bottom-5 right-5 transform translate-x-1/2 translate-y-1/2" width="300" height="350" viewBox="0 0 300 250" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="100" cy="100" r="100" fill="#57C5B6" />
                </svg>
            </div>
            <div class="z-0 relative overflow-hidden flex flex-col justify-between col-span-6 md:col-span-3 bg-white shadow-sm rounded-xl h-44 p-4 lg:p-5">
                <h3 class="text-lg lg:text-xl">Montant des commandes sur les 30 derniers jours</h3>
                <p class="text-right text-white"><span class="text-3xl lg:text-4xl font-bold">{{ $orderMountLastMounth }}</span> €</p>
                 <svg class="absolute -z-10 -bottom-5 right-5 transform translate-x-1/2 translate-y-1/2" width="300" height="350" viewBox="0 0 300 250" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="100" cy="100" r="100" fill="#57C5B6" />
                </svg>
            </div>
            <div class="z-0 relative overflow-hidden flex flex-col justify-between col-span-6 md:col-span-3 bg-white shadow-sm rounded-xl h-44 p-4 lg:p-5">
                <h3 class="text-lg lg:text-xl">Nombre de commande depuis le début</h3>
                <p class="text-right text-white text-sm"><span class="text-3xl lg:text-4xl font-bold">{{ $orderCountTotal }}</span> Commandes</p>
                 <svg class="absolute -z-10 -bottom-5 right-5 transform translate-x-1/2 translate-y-1/2" width="300" height="350" viewBox="0 0 300 250" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="100" cy="100" r="100" fill="#57C5B6" />
                </svg>
            </div>
            <div class="z-0 relative overflow-hidden flex flex-col justify-between col-span-6 md:col-span-3 bg-white shadow-sm rounded-xl h-44 p-4 lg:p-5 ">
                <h3 class="text-lg lg:text-xl">Montant des commandes depuis le début</h3>
                <p class="text-right text-white"><span class="text-3xl lg:text-4xl font-bold">{{ $orderMountTotal }}</span> €</p>
                <svg class="absolute -z-10 -bottom-5 right-5 transform translate-x-1/2 translate-y-1/2" width="300" height="350" viewBox="0 0 300 250" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="100" cy="100" r="100" fill="#57C5B6" />
                </svg>
            </div>
        </div>
        <h3 class="text-xl font-semibold col-span-full">Listes des commandes</h3>
        <div class="col-span-full">
            @livewire('datatable-orders')
        </div>
    </div>
</x-admin-layout>

