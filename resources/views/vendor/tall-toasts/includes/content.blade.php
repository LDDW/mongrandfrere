<div
    class="overflow-hidden z-50 p-3 bg-white rounded-sm shadow cursor-pointer pointer-events-auto select-none border-l-4 hover:bg-gray-50"
    x-bind:class="{
                    'border-blue-700': toast.type === 'info',
                    'border-green-700': toast.type === 'success',
                    'border-yellow-700': toast.type === 'warning',
                    'border-red-700': toast.type === 'danger'
                  }"
>
    <div class="flex justify-between items-center space-x-5 rtl:space-x-reverse">
        <div class="flex-1 ltr:mr-2 rtl:ml-2">
            <div
                class="mb-1 font-black tracking-widest text-gray-900 uppercase font-large"
                x-html="toast.title"
                x-show="toast.title !== undefined"
            ></div>

            <div
                class="text-gray-900 text-sm"
                x-show="toast.message !== undefined"
                x-html="toast.message"
            ></div>
        </div>

        @include('tall-toasts::includes.icon')
    </div>
</div>
