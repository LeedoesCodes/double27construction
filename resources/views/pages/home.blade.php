<x-layout>
    {{-- ============ HERO ============ --}}
    <section class="relative flex min-h-[88vh] items-center overflow-hidden">
        @php($hero = $site->hero_image ? asset('storage/'.$site->hero_image) : null)
        @if($hero)
            <img src="{{ $hero }}" alt="Double 27 Construction Supply operations" class="absolute inset-0 h-full w-full object-cover">
        @else
            <div class="absolute inset-0 bg-ink-900"></div>
        @endif
        <div class="absolute inset-0 bg-gradient-to-r from-ink-950 via-ink-950/85 to-ink-950/30"></div>
        <div class="absolute inset-0 bg-gradient-to-t from-ink-950 via-transparent to-transparent"></div>

        <div class="container-x relative py-24">
            <div class="max-w-2xl">
                <p class="eyebrow">Founded 2022 &middot; Philippines</p>
                <h1 class="mt-4 font-display text-4xl font-bold uppercase leading-[1.05] text-white sm:text-6xl lg:text-7xl">
                    Building on a<br><span class="text-hazard-500">Foundation</span> of Quality
                </h1>
                <p class="mt-6 max-w-xl text-lg leading-relaxed text-neutral-300">
                    {{ $site->tagline ?? 'High-grade aggregates and expert concreting services for infrastructure, commercial, and residential projects.' }}
                </p>
                <div class="mt-9 flex flex-wrap gap-4">
                    <a href="{{ route('services') }}" class="btn-primary">Our Services</a>
                    <a href="{{ route('contact') }}" class="btn-outline">Request a Quote</a>
                </div>
            </div>
        </div>
    </section>

    {{-- ============ CREDENTIALS BAR ============ --}}
    <section class="border-y border-ink-800 bg-ink-900">
        <div class="container-x grid grid-cols-2 divide-x divide-ink-800 lg:grid-cols-4">
            @foreach([
                ['label' => 'Standards Compliant', 'value' => 'DPWH · ASTM'],
                ['label' => 'Core Business', 'value' => 'Aggregates & Concreting'],
                ['label' => 'Operating Since', 'value' => '2022'],
                ['label' => 'Coverage', 'value' => 'Mindanao · Visayas'],
            ] as $stat)
                <div class="px-4 py-8 text-center sm:px-6">
                    <div class="font-display text-xl font-semibold text-white sm:text-2xl">{{ $stat['value'] }}</div>
                    <div class="mt-1 text-xs uppercase tracking-widest text-neutral-500">{{ $stat['label'] }}</div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ============ SERVICES ============ --}}
    @if($services->isNotEmpty())
    <section class="section">
        <div class="container-x">
            <div class="max-w-2xl">
                <p class="eyebrow">What We Do</p>
                <h2 class="mt-3 text-3xl font-bold uppercase text-white sm:text-4xl">Core Services</h2>
                <p class="mt-4 text-neutral-400">From material supply to finished structural concrete, we deliver reliably and on schedule.</p>
            </div>
            <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach($services as $service)
                    <div class="group border border-ink-800 bg-ink-900 transition hover:border-hazard-500/60">
                        @if($service->image)
                            <div class="aspect-[16/10] overflow-hidden">
                                <img src="{{ asset('storage/'.$service->image) }}" alt="{{ $service->title }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                            </div>
                        @endif
                        <div class="p-6">
                            <h3 class="font-display text-xl font-semibold uppercase text-white">{{ $service->title }}</h3>
                            <p class="mt-3 text-sm leading-relaxed text-neutral-400">{{ \Illuminate\Support\Str::limit($service->description, 150) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- ============ PRODUCTS / AGGREGATES ============ --}}
    @if($products->isNotEmpty())
    <section class="section border-t border-ink-800 bg-ink-900">
        <div class="container-x">
            <div class="flex flex-wrap items-end justify-between gap-6">
                <div class="max-w-2xl">
                    <p class="eyebrow">Materials</p>
                    <h2 class="mt-3 text-3xl font-bold uppercase text-white sm:text-4xl">Aggregate Supply</h2>
                </div>
                <a href="{{ route('services') }}" class="btn-outline">View All Materials</a>
            </div>
            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                @foreach($products as $product)
                    <div class="group relative overflow-hidden border border-ink-800">
                        <div class="aspect-square">
                            @if($product->image)
                                <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                            @else
                                <div class="flex h-full w-full items-center justify-center bg-ink-800 text-ink-600">
                                    <span class="font-display text-6xl">27</span>
                                </div>
                            @endif
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-ink-950 via-ink-950/20 to-transparent"></div>
                        <div class="absolute inset-x-0 bottom-0 p-5">
                            <span class="text-xs uppercase tracking-widest text-hazard-500">{{ $product->category }}</span>
                            <h3 class="mt-1 font-display text-xl font-semibold uppercase text-white">{{ $product->name }}</h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    {{-- ============ FEATURED PROJECTS ============ --}}
    @if($featuredProjects->isNotEmpty())
    <section class="section">
        <div class="container-x">
            <div class="max-w-2xl">
                <p class="eyebrow">Track Record</p>
                <h2 class="mt-3 text-3xl font-bold uppercase text-white sm:text-4xl">Featured Projects</h2>
            </div>
            <div class="mt-12 grid gap-6 md:grid-cols-2">
                @foreach($featuredProjects as $project)
                    <div class="group relative overflow-hidden border border-ink-800">
                        <div class="aspect-[16/9]">
                            @if($project->image)
                                <img src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->name }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                            @else
                                <div class="h-full w-full bg-ink-800"></div>
                            @endif
                        </div>
                        <div class="absolute inset-0 bg-gradient-to-t from-ink-950 via-ink-950/40 to-transparent"></div>
                        <div class="absolute inset-x-0 bottom-0 p-6">
                            <div class="flex items-center gap-3 text-xs uppercase tracking-widest text-hazard-500">
                                <span>{{ $project->client }}</span>
                                @if($project->year)<span class="text-neutral-500">/ {{ $project->year }}</span>@endif
                            </div>
                            <h3 class="mt-2 font-display text-2xl font-semibold uppercase text-white">{{ $project->name }}</h3>
                            @if($project->scope)<p class="mt-1 text-sm text-neutral-300">{{ $project->scope }}</p>@endif
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-10">
                <a href="{{ route('projects') }}" class="btn-outline">See All Projects</a>
            </div>
        </div>
    </section>
    @endif

    {{-- ============ CTA BAND ============ --}}
    <section class="border-t border-ink-800 bg-hazard-500">
        <div class="container-x flex flex-col items-center justify-between gap-6 py-14 text-center sm:flex-row sm:text-left">
            <div>
                <h2 class="text-2xl font-bold uppercase text-ink-950 sm:text-3xl">Need aggregates or a concreting partner?</h2>
                <p class="mt-2 text-ink-900/80">Reliable supply, standards-compliant workmanship, on-time delivery.</p>
            </div>
            @if($site->phone)
                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $site->phone) }}" class="inline-flex items-center gap-2 bg-ink-950 px-8 py-4 font-display text-sm font-semibold uppercase tracking-wider text-white transition hover:bg-ink-900">
                    Call {{ $site->phone }}
                </a>
            @endif
        </div>
    </section>
</x-layout>
