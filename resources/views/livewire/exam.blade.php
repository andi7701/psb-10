<div class='lg:flex lg:flex-row  p-5 lg:space-x-3 space-y-5 lg:space-y-0'>
    {{-- <x-loading></x-loading> --}}
    @switch($status)
        @case('petunjuk')
            <div class="border-2 border-slate-700 space-y-3 p-5 grow">
                <p class="text-slate-600 text-center font-bold">
                    Selamat datang , Anda sedang berada di dashboard Test Akademik SMP AL Musyaffa'
                </p>
                <p class="text-slate-600 font-bold">
                    Petunjuk :
                </p>
                <ol class="list-decimal text-slate-600 ml-5">
                    <li>Anda akan melakukan 2 sesi test akademik</li>
                    <li>Test yang pertama adalah test pengetahuan mata pelajaran dan umum</li>
                    <li>Test akademik berupa pilihan ganda</li>
                    <li>Jawaban yang anda pilih akan otomatis tersimpan oleh sistem</li>
                    <li>Jika sudah selesai tekan tombol submit untuk menyelesaikan test akademik</li>
                    <li>Test yang kedua adalah test gaya belajar anda</li>
                </ol>
                <div class="flex justify-end">
                    <x-button wire:click.prevent="changeStatus('akademik')" positive label="Mulai Test" />
                </div>
            </div>
        @break

        @case('akademik')
            <div class="basis-5/6 border-2 border-slate-700 space-y-3 p-5">
                <p class="text-slate-600">Soal {{ $priority }}/{{ $count }}</p>
                @if ($question->foto)
                    <img src="{{ asset('images/' . $question->foto) }}" />
                @endif
                <p class="text-slate-700 text-justify">
                    {{ $question->body }}
                </p>
                <ul>
                    @foreach (json_decode($question->answers) as $index => $item)
                        @if (!is_null($answer))
                            <div class="flex items-center space-x-3  ">
                                @if ($answer->answer == $index)
                                    <x-icon wire:click.prevent="choiceOption({{ $index }})" name="check-circle"
                                        class="w-6 h-6 text-white  fill-emerald-500 hover:cursor-pointer" />
                                @else
                                    <x-icon wire:click.prevent="choiceOption({{ $index }})" name="stop"
                                        class="w-6 h-6 hover:cursor-pointer" />
                                @endif
                                <span wire:click.prevent="choiceOption({{ $index }})"
                                    class="hover:cursor-pointer">{{ $item }}</span>
                            </div>
                        @else
                            <div class="flex items-center space-x-3  ">
                                <x-icon wire:click.prevent="choiceOption({{ $index }})" name="stop"
                                    class="w-6 h-6 hover:cursor-pointer" />
                                <span wire:click.prevent="choiceOption({{ $index }})"
                                    class="hover:cursor-pointer">{{ $item }}</span>
                            </div>
                        @endif
                    @endforeach
                </ul>
                <div class="flex justify-between">
                    <x-button wire:click.prevent="prev" secondary label="Sebelumnya"
                        class="{{ $priority > 1 ? 'visible' : 'invisible' }}" />
                    <x-button wire:click="next" secondary label="Selanjutnya"
                        class="{{ $priority < 20 ? 'visible' : 'invisible' }}" />
                </div>
            </div>
            <div class="border-2 border-slate-700 p-3 lg:space-y-2">
                <div class="grid grid-rows-5 grid-flow-col gap-2">
                    @foreach ($questions as $item)
                        @php
                            $jawaban = App\Models\Answer::whereQuestionId($item->priority)
                                ->whereUserId(auth()->user()->id)
                                ->first();
                        @endphp
                        @if (!is_null($jawaban))
                            <div wire:click.prevent="setPriority({{ $item->priority }})"
                                class="border border-slate-600 rounded-md h-10 w-10 flex items-center justify-center bg-emerald-300 hover:cursor-pointer hover:scale-110 transform transition duration-300 ease-in-out">
                                <span class="text-xl font-bold text-slate-700">{{ $item->priority }}</span>
                            </div>
                        @else
                            <div wire:click.prevent="setPriority({{ $item->priority }})"
                                class="border border-slate-600 rounded-md h-10 w-10 flex items-center justify-center bg-slate-100 hover:cursor-pointer hover:scale-110 transform transition duration-300 ease-in-out">
                                <span class="text-xl font-bold text-slate-700">{{ $item->priority }}</span>
                            </div>
                        @endif
                    @endforeach
                </div>
                <x-button wire:click.prevent="simpan" negative label="Submit" />
            </div>
        @break

        @case('gaya')
            <div class="basis-5/6 border-2 border-slate-700 space-y-3 p-5">
                <p class="text-slate-600">Soal {{ $prioritas }}/{{ $hitung }}</p>
                <p class="text-slate-700 text-justify">
                    {{ $gaya->body }}
                </p>
                <ul>
                    @foreach (json_decode($gaya->answers) as $index => $item)
                        @if (!is_null($jawab))
                            <div class="flex items-center space-x-3  ">
                                @if ($jawab->answer == $index)
                                    <x-icon wire:click.prevent="pilihJawaban({{ $index }})" name="check-circle"
                                        class="w-6 h-6 text-white  fill-emerald-500 hover:cursor-pointer" />
                                @else
                                    <x-icon wire:click.prevent="pilihJawaban({{ $index }})" name="stop"
                                        class="w-6 h-6 hover:cursor-pointer" />
                                @endif
                                <span wire:click.prevent="pilihJawaban({{ $index }})"
                                    class="hover:cursor-pointer">{{ $item }}</span>
                            </div>
                        @else
                            <div class="flex items-center space-x-3  ">
                                <x-icon wire:click.prevent="pilihJawaban({{ $index }})" name="stop"
                                    class="w-6 h-6 hover:cursor-pointer" />
                                <span wire:click.prevent="pilihJawaban({{ $index }})"
                                    class="hover:cursor-pointer">{{ $item }}</span>
                            </div>
                        @endif
                    @endforeach
                </ul>
                <div class="flex justify-between">
                    <x-button wire:click.prevent="sebelum" secondary label="Sebelumnya"
                        class="{{ $prioritas > 1 ? 'visible' : 'invisible' }}" />
                    <x-button wire:click="lanjut" secondary label="Selanjutnya"
                        class="{{ $prioritas < 11 ? 'visible' : 'invisible' }}" />
                </div>
            </div>
            <div class="border-2 border-slate-700 p-3 lg:space-y-2">
                <div class="grid grid-rows-5 grid-flow-col gap-2">
                    @foreach ($gayas as $item)
                        @php
                            $jawaban = App\Models\JawabGaya::whereGayaId($item->priority)
                                ->whereUserId(auth()->user()->id)
                                ->first();
                        @endphp
                        @if (!is_null($jawaban))
                            <div wire:click.prevent="setPrioritas({{ $item->priority }})"
                                class="border border-slate-600 rounded-md h-10 w-10 flex items-center justify-center bg-emerald-300 hover:cursor-pointer hover:scale-110 transform transition duration-300 ease-in-out">
                                <span class="text-xl font-bold text-slate-700">{{ $item->priority }}</span>
                            </div>
                        @else
                            <div wire:click.prevent="setPrioritas({{ $item->priority }})"
                                class="border border-slate-600 rounded-md h-10 w-10 flex items-center justify-center bg-slate-100 hover:cursor-pointer hover:scale-110 transform transition duration-300 ease-in-out">
                                <span class="text-xl font-bold text-slate-700">{{ $item->priority }}</span>
                            </div>
                        @endif
                    @endforeach
                </div>
                <x-button wire:click.prevent="akhiri" negative label="Submit" />
            </div>
        @break

        @case('akhir')
            <div class="border-2 border-slate-700 space-y-3 p-5 grow">
                <p class="text-slate-600 text-center font-bold">
                    Selamat , Anda telah selesai melaksanakan Test Akademik SMP AL Musyaffa'
                </p>
                <form action="{{ route('logout') }}" method="POST" class="justify-center flex">
                    @csrf
                    <x-button positive type="submit">Log Out</x-button>
                </form>
            </div>
        @break

        @default
    @endswitch

</div>
