<x-app-layout>
    <div class="space-y-32">
        
        <!-- Header -->
        <div class="mb-32">
            <h1 class="text-h1 text-secondary tracking-tight">Shared <span class="text-primary font-black italic">Workspace</span></h1>
            <p class="text-body text-muted">A collaborative space for all MediConnect portal members.</p>
        </div>

        <!-- Content Card -->
        <x-card class="border-none shadow-sm p-48 text-center bg-white overflow-hidden relative">
            <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-primary via-medical-teal to-primary"></div>
            <div class="max-w-2xl mx-auto">
                <div class="w-20 h-20 bg-primary/5 text-primary rounded-full flex items-center justify-center mx-auto mb-24">
                    <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                </div>
                <h3 class="text-h2 text-secondary font-black mb-16 uppercase tracking-widest text-center">General Information</h3>
                <p class="text-body text-muted mb-32 leading-relaxed">
                    This is a shared dashboard environment accessible to all user roles. Use this space for general portal announcements, system-wide updates, or collaborative data.
                </p>
                <div class="flex flex-col sm:flex-row justify-center items-center gap-16">
                    <x-button variant="primary" class="w-full sm:w-auto">View Global Stats</x-button>
                    <x-button variant="outline" class="w-full sm:w-auto">Community Guidelines</x-button>
                </div>
            </div>
        </x-card>

    </div>
</x-app-layout>
