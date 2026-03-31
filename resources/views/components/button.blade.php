@props([
    'variant' => 'primary',
    'size' => 'md',
    'type' => 'button',
    'href' => null
])

@php
    $baseStyles = "inline-flex items-center justify-center rounded-card font-medium transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none active:scale-[0.98]";
    
    $variants = [
        'primary' => "bg-primary text-white hover:bg-primary-dark focus:ring-primary shadow-sm shadow-primary/20 hover:scale-[1.02]",
        'secondary' => "bg-secondary-light text-secondary hover:bg-slate-200 focus:ring-secondary",
        'outline' => "border-2 border-primary text-primary hover:bg-primary/5 focus:ring-primary",
        'medical' => "bg-medical-teal text-white hover:bg-medical-teal/90 focus:ring-medical-teal shadow-sm shadow-medical-teal/20 hover:scale-[1.02]",
        'ghost' => "text-secondary hover:bg-secondary-light focus:ring-secondary",
        'danger' => "bg-medical-red text-white hover:bg-medical-red/90 focus:ring-medical-red shadow-sm shadow-medical-red/20",
    ];

    $sizes = [
        'sm' => "px-3 py-1.5 text-small",
        'md' => "px-5 py-2.5 text-body",
        'lg' => "px-8 py-3.5 text-lg",
    ];

    $classes = $baseStyles . " " . $variants[$variant] . " " . $sizes[$size];
@endphp

@if($href)
    <a {{ $attributes->merge(['href' => $href, 'class' => $classes]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['type' => $type, 'class' => $classes]) }}>
        {{ $slot }}
    </button>
@endif
