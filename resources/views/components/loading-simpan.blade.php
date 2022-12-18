<div wire:loading.delay wire:target="simpan" wire:loading.class.remove='hidden' class="relative z-50 hidden" aria-labelledby="modal-title" role="dialog" aria-modal="true">
    <!--
    Background backdrop, show/hide based on modal state.

    Entering: "ease-out duration-300"
      From: "opacity-0"
      To: "opacity-100"
    Leaving: "ease-in duration-200"
      From: "opacity-100"
      To: "opacity-0"
  -->
    <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

    <div class="fixed inset-0 z-50 overflow-y-auto">
        <div class="flex min-h-full justify-center p-4 text-center items-center">
            <!--
        Modal panel, show/hide based on modal state.

        Entering: "ease-out duration-300"
          From: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
          To: "opacity-100 translate-y-0 sm:scale-100"
        Leaving: "ease-in duration-200"
          From: "opacity-100 translate-y-0 sm:scale-100"
          To: "opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
      -->
            <div
                class="relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all   flex justify-center items-center h-64 w-80 lg:h-72 lg:w-[640px]">
                {{-- <h1 class="animate-spin border-t-2 border-r-2 rounded-full border-emerald-400 w-16 h-16"></h1> --}}
                <div class="flex flex-col items-center">
                    <img src="{{ asset('images/logoalfa.png') }}" alt="loading" class="animate-bounce w-28 h-28">
                    <span class="text-xl font-bold animate-pulse text-emerald-700">Memuat Data...</span>
                </div>
            </div>
        </div>
    </div>
</div>
