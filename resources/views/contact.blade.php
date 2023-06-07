<x-app-layout>
    <div class="mx-auto py-10">
        <div class="w-full bg-white shadow-md overflow-hidden rounded-xl p-10 max-w-md md:max-w-xl mx-auto">
            <form method="POST" action="">
                @csrf

                <h1 class="text-center font-bold text-2xl mb-10">Contacte-nous directement ici !</h1>

                <div class="mb-6">
                    <x-input type="text" fieldName="lastname" label="Nom" name="lastname" required autofocus autocomplete="lastname" placeholder="Entrez votre nom" />
                </div>
    
                <div class="mt-4 mb-6">
                    <x-input type="text" fieldName="firstname" label="Prénom" name="firstname" required autofocus autocomplete="firstname" placeholder="Entrez votre prénom" />
                </div>

                <div class="mt-4 mb-6">
                    <x-input type="email" fieldName="email" label="E-mail" name="email" required autofocus autocomplete="email" placeholder="Entrez votre e-mail" />
                </div>

                <div class="mt-4 mb-6 relative">
                    <label for="message" class="block absolute -top-2 left-4 z-10 px-1 text-xs text-gray-500 select-none bg-white @error("message") border-red-400 @enderror">Message</label>
                    <textarea name="message" id="message" cols="30" rows="10" placeholder="Entrez votre message" class="w-full px-3 py-2.5 text-sm border-[0.5px] rounded-sm border-gray-300 outline-none focus:border-black transition-all resize-none"></textarea>
                    @error("message")
                        <div class="mt-2 text-red-400 text-sm">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-4 mb-6">
                    <label for="file" class="block z-10 px-1 select-none bg-white text-center cursor-pointer">Joindre un fichier</label>
                    <input type="file" name="file" id="file" class="hidden">
                    @error("file")
                        <div class="mt-2 text-red-400 text-sm">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="flex justify-end mt-4">
                    <x-datatable-button label="Envoyer" class="w-full mb-4 rounded-xl" color="mgf"/>
                </div>
            </form>
        </div>
    </div>
    @push('scripts')
        <script>
            const file = document.getElementById('file');
            const label = document.querySelector('label[for="file"]');

            file.addEventListener('change', (e) => {
                label.innerHTML = `fichier ajouté : ${file.files[0].name}`;
                console.log(file.files[0].name);
            });
        </script>
    @endpush
</x-app-layout>