@php($navLinks = [
    'home' => 'Home',
    'about' => 'About',
    'services' => 'Services',
    'projects' => 'Projects',
    'contact' => 'Contact',
])

<header
    id="site-nav"
    class="sticky top-0 z-50 border-b border-ink-800 bg-ink-950/90 backdrop-blur supports-[backdrop-filter]:bg-ink-950/75"
>
    <div class="container-x flex h-16 items-center justify-between gap-4 sm:h-20">
        {{-- Brand --}}
        <a href="{{ route('home') }}" class="flex items-center gap-3">
            <span class="flex h-9 w-9 items-center justify-center bg-hazard-500 font-display text-lg font-bold text-ink-950">27</span>
            <span class="font-display text-lg font-semibold uppercase leading-none tracking-wide text-white sm:text-xl">
                Double 27
                <span class="block text-[10px] font-medium tracking-[0.25em] text-neutral-400">Construction Supply</span>
            </span>
        </a>

        {{-- Desktop nav --}}
        <nav class="hidden items-center gap-8 lg:flex">
            @foreach($navLinks as $route => $label)
                <a
                    href="{{ route($route) }}"
                    @class([
                        'font-display text-sm font-medium uppercase tracking-wider transition hover:text-hazard-400',
                        'text-hazard-500' => request()->routeIs($route),
                        'text-neutral-300' => ! request()->routeIs($route),
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
            class="inline-flex h-11 w-11 items-center justify-center border border-ink-700 text-neutral-200 lg:hidden"
        >
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </div>

    {{-- Mobile menu --}}
    <div data-nav-menu class="hidden border-t border-ink-800 bg-ink-950 lg:hidden">
        <nav class="container-x flex flex-col py-4">
            @foreach($navLinks as $route => $label)
                <a
                    href="{{ route($route) }}"
                    @class([
                        'border-b border-ink-800/60 py-3 font-display text-sm font-medium uppercase tracking-wider',
                        'text-hazard-500' => request()->routeIs($route),
                        'text-neutral-300' => ! request()->routeIs($route),
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
