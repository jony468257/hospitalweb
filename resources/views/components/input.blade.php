@props([
    'label' => null,
    'error' => null,
    'type' => 'text',
    'placeholder' => '',
    'name' => '',
    'id' => '',
    'value' => ''
])

@php
    $id = $id ?: $name;
    $baseStyles = "w-full px-16 py-12 rounded-card border-secondary-light text-body transition-all duration-200 outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary placeholder:text-muted bg-slate-50 hover:bg-white";
    $errorStyles = $error ? "border-medical-red focus:ring-medical-red/20 focus:border-medical-red" : "border-slate-200";
    $classes = $baseStyles . " " . $errorStyles;
@endphp

<div class="space-y-8">
    @if($label)
        <label for="{{ $id }}" class="block text-small font-medium text-secondary">
            {{ $label }}
        </label>
    @endif

    <div class="relative">
        <input 
            type="{{ $type }}" 
            name="{{ $name }}" 
            id="{{ $id }}" 
            value="{{ $value }}"
            placeholder="{{ $placeholder }}"
            {{ $attributes->merge(['class' => $classes]) }}
        >
        @if($error)
            <div class="mt-4 text-small text-medical-red">
                {{ $error }}
            </div>
        @endif
    </div>
</div>
