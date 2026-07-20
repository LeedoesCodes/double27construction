<x-layout title="Services" metaDescription="Aggregate supply (sand, gravel, crushed stone) and concreting sub-contracting services by Double 27 Construction Supply.">
    {{-- Page header --}}
    <section class="border-b border-ink-800 bg-ink-900">
        <div class="container-x py-20 sm:py-24">
            <p class="eyebrow">Our Services</p>
            <h1 class="mt-3 text-4xl font-bold uppercase text-white sm:text-5xl">What We Offer</h1>
            <p class="mt-5 max-w-3xl text-lg leading-relaxed text-neutral-300">
                A full range of construction aggregates and comprehensive concreting sub-contracting, delivered with a safety-first approach.
            </p>
        </div>
    </section>

    {{-- Aggregate materials --}}
    <section class="section">
        <div class="container-x">
            <div class="max-w-2xl">
                <p class="eyebrow">Aggregate Supply</p>
                <h2 class="mt-3 text-3xl font-bold uppercase text-white sm:text-4xl">Construction Materials</h2>
                <p class="mt-4 text-neutral-400">Well-graded, high-grade aggregates suitable for structural concrete, foundations, roads, and paving.</p>
            </div>

            @if($products->isNotEmpty())
                <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
                    @foreach($products as $product)
                        <div class="group overflow-hidden border border-ink-800 bg-ink-900">
                            <div class="aspect-[4/3] overflow-hidden">
                                @if($product->image)
                                    <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                                @else
                                    <div class="flex h-full w-full items-center justify-center bg-ink-800 text-ink-600"><span class="font-display text-6xl">27</span></div>
                                @endif
                            </div>
                            <div class="p-6">
                                <span class="text-xs uppercase tracking-widest text-hazard-500">{{ $product->category }}</span>
                                <h3 class="mt-1 font-display text-xl font-semibold uppercase text-white">{{ $product->name }}</h3>
                                @if($product->description)<p class="mt-3 text-sm leading-relaxed text-neutral-400">{{ $product->description }}</p>@endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif

            <div class="mt-10 border border-ink-800 bg-ink-900 p-6">
                <h3 class="font-display text-lg font-semibold uppercase text-white">Quality Assurance</h3>
                <p class="mt-2 max-w-3xl text-sm text-neutral-400">Compliance with local and international standards (DPWH, ASTM). Regular materials testing and inspection, with reliable delivery to project sites.</p>
            </div>
        </div>
    </section>

    {{-- Concreting services --}}
    <section class="section border-t border-ink-800 bg-ink-900">
        <div class="container-x">
            <div class="max-w-2xl">
                <p class="eyebrow">Concreting Sub-Contracting</p>
                <h2 class="mt-3 text-3xl font-bold uppercase text-white sm:text-4xl">Concreting Services</h2>
                <p class="mt-4 text-neutral-400">Comprehensive structural concrete works for slabs, beams, columns, and pavements.</p>
            </div>

            <div class="mt-12 grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @php($concreteServices = $services->isNotEmpty() ? $services : collect([
                    (object)['title' => 'Site Preparation & Layout', 'description' => 'Ground works, layout, and setting-out for accurate construction.', 'image' => null],
                    (object)['title' => 'Formwork & Reinforcement', 'description' => 'Formwork assembly and steel reinforcement installation to specification.', 'image' => null],
                    (object)['title' => 'Concrete Placement', 'description' => 'Ready-mix or site-mixed concrete placement with proper compaction.', 'image' => null],
                    (object)['title' => 'Finishing & Curing', 'description' => 'Quality concrete finishing and controlled curing for durability.', 'image' => null],
                    (object)['title' => 'Structural Concrete', 'description' => 'Slabs, beams, columns, and pavements built to project specs.', 'image' => null],
                    (object)['title' => 'Roads & Bridges', 'description' => 'Road concreting and bridge girder works for civil infrastructure.', 'image' => null],
                ]))
                @foreach($concreteServices as $service)
                    <div class="group overflow-hidden border border-ink-800 bg-ink-950">
                        @if($service->image)
                            <div class="aspect-[16/10] overflow-hidden">
                                <img src="{{ asset('storage/'.$service->image) }}" alt="{{ $service->title }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                            </div>
                        @endif
                        <div class="p-6">
                            <h3 class="font-display text-lg font-semibold uppercase text-white">{{ $service->title }}</h3>
                            <p class="mt-2 text-sm leading-relaxed text-neutral-400">{{ $service->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-12 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
                @foreach([
                    'Skilled, experienced workforce',
                    'Fleet of modern equipment',
                    'Adherence to project specs',
                    'Timely, safety-first completion',
                ] as $highlight)
                    <div class="flex items-center gap-3 border border-ink-800 bg-ink-950 p-4">
                        <span class="h-2 w-2 flex-none bg-hazard-500"></span>
                        <span class="text-sm text-neutral-300">{{ $highlight }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- CTA --}}
    <section class="border-t border-ink-800 bg-hazard-500">
        <div class="container-x flex flex-col items-center justify-between gap-6 py-14 text-center sm:flex-row sm:text-left">
            <h2 class="text-2xl font-bold uppercase text-ink-950 sm:text-3xl">Tell us about your project.</h2>
            <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 bg-ink-950 px-8 py-4 font-display text-sm font-semibold uppercase tracking-wider text-white transition hover:bg-ink-900">Request a Quote</a>
        </div>
    </section>
</x-layout>
