@props([
    'padding' => 'p-16',
    'shadow' => 'shadow-card',
    'rounded' => 'rounded-card',
    'hover' => true,
    'border' => true
])

@php
    $baseStyles = "bg-white overflow-hidden transition-all duration-300";
    $borderStyle = $border ? "border border-secondary-light" : "";
    $hoverStyle = $hover ? "hover:shadow-lg hover:border-primary/20 hover:-translate-y-1" : "";
    
    $classes = $baseStyles . " " . $rounded . " " . $padding . " " . $shadow . " " . $hoverStyle . " " . $borderStyle;
@endphp

<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>
