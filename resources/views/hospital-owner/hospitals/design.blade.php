@extends('layouts.app')

@section('header')
    <div class="flex items-center justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Design Hospital Page') }}: {{ $hospital->name }}
        </h2>
        <div class="flex space-x-3">
            <button id="save-design" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                Save Design
            </button>
            <a href="{{ route('public.hospital.show', $hospital->slug) }}" target="_blank" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
                Preview
            </a>
        </div>
    </div>
@endsection

@section('content')
    <!-- GrapesJS Editor -->
    <link rel="stylesheet" href="https://unpkg.com/grapesjs/dist/css/grapes.min.css">
    <script src="https://unpkg.com/grapesjs"></script>
    <script src="https://unpkg.com/grapesjs-preset-webpage"></script>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div id="gjs" style="height: 800px; overflow: hidden;">
                    <!-- Default Content if Empty -->
                    @if(!$hospital->custom_design)
                        <div class="p-20 text-center">
                            <h1 class="text-4xl font-bold mb-4">Start Designing Your Hospital Page!</h1>
                            <p class="text-gray-600">Drag blocks from the right sidebar to build your page.</p>
                        </div>
                    @else
                        {!! $hospital->custom_design['html'] ?? '' !!}
                        <style>{!! $hospital->custom_design['css'] ?? '' !!}</style>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        const editor = grapesjs.init({
            container: '#gjs',
            fromElement: true,
            height: '800px',
            width: 'auto',
            storageManager: false,
            plugins: ['gjs-preset-webpage'],
            pluginsOpts: {
                'gjs-preset-webpage': {}
            },
            canvas: {
                styles: [
                    'https://cdn.tailwindcss.com',
                    'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap'
                ]
            }
        });

        // Define Blocks
        const blockManager = editor.BlockManager;

        // Hero Block
        blockManager.add('hero-section', {
            label: 'Hero Banner',
            category: 'Hospital Sections',
            content: `
                <section class="relative min-h-[450px] flex items-center overflow-hidden font-sans">
                    <div class="absolute inset-0 z-0">
                        <img src="/images/hospital_hero_bg.png" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-gradient-to-r from-black/95 via-black/70 to-transparent"></div>
                    </div>
                    <div class="relative z-10 max-w-7xl mx-auto px-4 py-20 text-white">
                        <h1 class="text-5xl md:text-6xl font-black mb-6 tracking-tight">{{ $hospital->name }}</h1>
                        <p class="text-lg md:text-xl text-slate-200 mb-10 max-w-2xl leading-relaxed">
                            {{ $hospital->description ?: 'Providing world-class healthcare services.' }}
                        </p>
                    </div>
                </section>
            `
        });

        // Services Block
        blockManager.add('services-section', {
            label: 'Services List',
            category: 'Hospital Sections',
            content: `
                <section class="py-16 bg-white font-sans">
                    <div class="max-w-7xl mx-auto px-4">
                        <h2 class="text-4xl font-black text-slate-900 mb-10">Our <span class="text-blue-600 italic">Services</span></h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            @foreach($hospital->services as $service)
                            <div class="p-6 rounded-3xl border border-slate-100 shadow-sm">
                                <h4 class="text-xl font-black text-slate-800">{{ $service->name }}</h4>
                                <p class="text-primary font-bold">৳{{ number_format($service->price, 0) }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            `
        });

        // Save Design
        document.getElementById('save-design').addEventListener('click', function() {
            const html = editor.getHtml();
            const css = editor.getCss();
            const json = editor.getProjectData();

            fetch('{{ route("hospital-owner.hospitals.save-design", $hospital->id) }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    design: {
                        html: html,
                        css: css,
                        json: json
                    }
                })
            })
            .then(response => response.json())
            .then(data => {
                if(data.success) {
                    alert('Design saved successfully!');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to save design.');
            });
        });
    </script>

    <style>
        /* GrapesJS Customization */
        .gjs-cv-canvas {
            width: 100% !important;
            height: 100% !important;
            top: 0 !important;
        }
    </style>
@endsection
