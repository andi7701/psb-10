
<div class="flex flex-col">
    <label {{ $attributes->merge(['class' => 'block font-bold text-lg text-gray-700']) }}>{{ $slot }}</label>
    <input type="text" {{ $attributes->merge(['class' => 'border-gray-300 focus:border-teal-500 focus:ring-teal-500 rounded-md shadow-sm']) }}>
</div>