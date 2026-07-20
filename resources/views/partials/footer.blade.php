<footer class="border-t border-ink-800 bg-ink-900">
    <div class="container-x grid gap-10 py-16 sm:grid-cols-2 lg:grid-cols-4">
        {{-- Brand --}}
        <div class="lg:col-span-1">
            <div class="inline-block rounded-xl bg-white p-3">
                <img src="{{ asset('storage/site/logo.png') }}" alt="{{ $site->company_name }}" class="h-16 w-auto">
            </div>
            <p class="mt-4 text-sm leading-relaxed text-neutral-400">
                {{ $site->tagline ?? 'Quality construction aggregates and expert concreting services in the Philippines.' }}
            </p>
        </div>

        {{-- Links --}}
        <div>
            <h4 class="font-display text-sm font-semibold uppercase tracking-widest text-white">Company</h4>
            <ul class="mt-4 space-y-2 text-sm">
                <li><a href="{{ route('about') }}" class="text-neutral-400 transition hover:text-hazard-400">About Us</a></li>
                <li><a href="{{ route('services') }}" class="text-neutral-400 transition hover:text-hazard-400">Services</a></li>
                <li><a href="{{ route('projects') }}" class="text-neutral-400 transition hover:text-hazard-400">Projects</a></li>
                <li><a href="{{ route('contact') }}" class="text-neutral-400 transition hover:text-hazard-400">Contact</a></li>
            </ul>
        </div>

        {{-- Contact --}}
        <div>
            <h4 class="font-display text-sm font-semibold uppercase tracking-widest text-white">Get in Touch</h4>
            <ul class="mt-4 space-y-3 text-sm text-neutral-400">
                @if($site->phone)
                    <li><a href="tel:{{ preg_replace('/[^0-9+]/', '', $site->phone) }}" class="transition hover:text-hazard-400">{{ $site->phone }}</a></li>
                @endif
                @if($site->email)
                    <li><a href="mailto:{{ $site->email }}" class="transition hover:text-hazard-400">{{ $site->email }}</a></li>
                @endif
                @if($site->facebook)
                    <li><a href="{{ $site->facebook }}" target="_blank" rel="noopener" class="transition hover:text-hazard-400">Facebook Page</a></li>
                @endif
            </ul>
        </div>

        {{-- Offices --}}
        <div>
            <h4 class="font-display text-sm font-semibold uppercase tracking-widest text-white">Offices</h4>
            <ul class="mt-4 space-y-3 text-sm text-neutral-400">
                @if($site->head_office)
                    <li><span class="block text-xs uppercase tracking-wider text-hazard-500">Head Office</span>{{ $site->head_office }}</li>
                @endif
                @if($site->sub_office)
                    <li><span class="block text-xs uppercase tracking-wider text-hazard-500">Sub Office</span>{{ $site->sub_office }}</li>
                @endif
            </ul>
        </div>
    </div>

    <div class="border-t border-ink-800">
        <div class="container-x flex flex-col items-center justify-between gap-2 py-6 text-xs text-neutral-500 sm:flex-row">
            <p>&copy; {{ date('Y') }} {{ $site->company_name }}. All rights reserved.</p>
            <p>Aggregate Supply &middot; Concreting &middot; Civil Works</p>
        </div>
    </div>
</footer>
