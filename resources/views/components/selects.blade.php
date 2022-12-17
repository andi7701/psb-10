@props(['options'])
<div>
    <label {{ $attributes->merge(['class' => 'block font-bold text-lg text-gray-700']) }}>{{ $slot }}</label>
    <select
        {{ $attributes->merge(['class' => 'border-gray-300 focus:border-teal-500 focus:ring-teal-500 rounded-md shadow-sm w-full']) }}>
        <option value="">Pilih</option>
        @foreach ($options as $option)
            <option value="{{ $option->id }}">{{ $option->name }}</option>
        @endforeach
    </select>
</div>
