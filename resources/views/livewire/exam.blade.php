<div class='lg:flex lg:flex-row  p-5 lg:space-x-3 space-y-5 lg:space-y-0'>
    <div class="basis-5/6 border-2 border-slate-700 space-y-3 p-5">
        <p class="text-slate-600">Soal 1/20</p>
        <p class="text-slate-700 text-justify">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat eveniet, soluta minima nesciunt omnis
            asperiores, a provident neque similique quas vero rerum, iste delectus nam error alias. Officiis, sint
            aspernatur aliquam voluptatum illum corporis vel minus adipisci sapiente expedita dolores blanditiis
            perferendis, nesciunt delectus dolor non sed alias, nulla iusto laboriosam ipsam nemo magni? Aut fuga maxime
            deserunt harum? Sequi eaque eligendi perferendis dignissimos eius enim, minus fugiat, quaerat aut corrupti
            maxime rem labore inventore natus asperiores voluptatem vel eos rerum, aspernatur dicta nesciunt. Cumque
            quam tenetur ab excepturi tempora explicabo? Repellat cumque neque optio asperiores modi aspernatur
            explicabo enim!
        </p>
        @foreach (range(1, 4) as $item)
            <ul>
                <li class="flex items-center space-x-3 hover:cursor-pointer ">
                    <x-icon name="stop" class="w-5 h-5" /> <span>Option {{ $item }}</span>
                </li>
            </ul>
        @endforeach
        <div class="flex justify-between">
            <x-button secondary label="Sebelumnya" class="invisible"/>
            <x-button secondary label="Selanjutnya" />
        </div>
    </div>
    <div class="border-2 border-slate-700 p-3 lg:space-y-2">
        <div class="grid grid-rows-5 grid-flow-col gap-2">
            @foreach (range(1, 20) as $item)
                <div class="border border-slate-600 rounded-md h-10 w-10 flex items-center justify-center bg-emerald-300 hover:cursor-pointer hover:scale-110 transform transition duration-300 ease-in-out">
                    <span class="text-xl font-bold text-slate-700">{{ $item }}</span>
                </div>
            @endforeach
        </div>
        <x-button negative label="Submit" />
    </div>
</div>
