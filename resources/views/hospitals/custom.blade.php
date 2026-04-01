<x-guest-layout>
    <div class="custom-hospital-page">
        {!! $design['html'] ?? '' !!}
    </div>
    
    <style>
        {!! $design['css'] ?? '' !!}
        
        /* Ensure Tailwind reset or specific styles don't break the public view */
        .custom-hospital-page section {
            position: relative;
        }
    </style>

    {{-- Fallback for Hero Section if not present in custom design --}}
    @if(!isset($design['html']) || empty($design['html']))
        <div class="py-20 bg-slate-100 text-center">
            <h1 class="text-4xl font-bold">{{ $hospital->name }}</h1>
            <p class="text-gray-600 mt-4">{{ $hospital->description }}</p>
        </div>
    @endif
</x-guest-layout>
