@props(['label'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-900']) }}>
    {{ $label ?? $slot }}
</label>


