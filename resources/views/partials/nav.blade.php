@php($navLinks = [
    'home' => 'Home',
    'about' => 'About',
    'services' => 'Services',
    'projects' => 'Projects',
    'contact' => 'Contact',
])

<header
    id="site-nav"
    class="sticky top-0 z-50 border-b border-neutral-200 bg-white/95 backdrop-blur supports-[backdrop-filter]:bg-white/85"
>
    <div class="container-x flex h-20 items-center justify-between gap-4 sm:h-24">
        {{-- Brand logo --}}
        <a href="{{ route('home') }}" class="flex items-center">
            <img src="{{ asset('storage/site/logo.png') }}" alt="{{ $site->company_name }}" class="h-14 w-auto sm:h-16">
        </a>

        {{-- Desktop nav --}}
        <nav class="hidden items-center gap-8 lg:flex">
            @foreach($navLinks as $route => $label)
                <a
                    href="{{ route($route) }}"
                    @class([
                        'font-display text-sm font-semibold uppercase tracking-wider transition hover:text-hazard-500',
                        'text-hazard-600' => request()->routeIs($route),
                        'text-ink-800' => ! request()->routeIs($route),
                    ])
                >{{ $label }}</a>
            @endforeach
        </nav>

        <div class="hidden items-center gap-4 lg:flex">
            @if($site->phone)
                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $site->phone) }}" class="btn-primary">
                    Call {{ $site->phone }}
                </a>
            @endif
        </div>

        {{-- Mobile toggle --}}
        <button
            type="button"
            data-nav-toggle
            aria-label="Toggle menu"
            class="inline-flex h-11 w-11 items-center justify-center border border-neutral-300 text-ink-800 lg:hidden"
        >
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    {{-- Mobile menu --}}
    <div data-nav-menu class="hidden border-t border-neutral-200 bg-white lg:hidden">
        <nav class="container-x flex flex-col py-4">
            @foreach($navLinks as $route => $label)
                <a
                    href="{{ route($route) }}"
                    @class([
                        'border-b border-neutral-100 py-3 font-display text-sm font-semibold uppercase tracking-wider',
                        'text-hazard-600' => request()->routeIs($route),
                        'text-ink-800' => ! request()->routeIs($route),
                    ])
                >{{ $label }}</a>
            @endforeach
            @if($site->phone)
                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $site->phone) }}" class="btn-primary mt-4">
                    Call {{ $site->phone }}
                </a>
            @endif
        </nav>
    </div>
</header>
