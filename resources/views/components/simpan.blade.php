<button wire:click.prevent="simpan" wire:target="simpan" wire:loading.attr='disabled' class="w-auto bg-emerald-500 rounded-md py-2 px-3  hover:bg-emerald-600 focus:ring focus:ring-white focus:border-white active:ring-emerald-500 active:border-emerald-500 flex justify-center items-center space-x-1 disabled:bg-slate-400">
    <span class="text-white">Simpan</span>
    {{-- <span wire:target="simpan" wire:loading class="animate-spin border-t-2 border-r-2 rounded-full border-white h-5 w-5"></span> --}}
</button>