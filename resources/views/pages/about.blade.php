<x-layout title="About Us" metaDescription="Double 27 Construction Supply — a leading provider of quality construction aggregates and concreting services in the Philippines since 2022.">
    {{-- Page header --}}
    <section class="border-b border-ink-800 bg-ink-900">
        <div class="container-x py-20 sm:py-24">
            <p class="eyebrow">Who We Are</p>
            <h1 class="mt-3 text-4xl font-bold uppercase text-white sm:text-5xl">About Double 27</h1>
            <p class="mt-5 max-w-3xl text-lg leading-relaxed text-neutral-300">
                {{ $site->about ?? 'DOUBLE 27 CONSTRUCTION SUPPLY is a leading provider of quality construction materials and specialized concreting services in the Philippines, committed to excellence, safety, and customer satisfaction.' }}
            </p>
        </div>
    </section>

    {{-- Vision & Mission --}}
    <section class="section">
        <div class="container-x grid gap-8 lg:grid-cols-2">
            <div class="border border-ink-800 bg-ink-900 p-8">
                <p class="eyebrow">Vision</p>
                <p class="mt-4 text-lg leading-relaxed text-neutral-200">
                    {{ $site->vision ?? 'To be the preferred partner in construction materials and concreting services — setting industry standards for reliability, quality, and sustainability.' }}
                </p>
            </div>
            <div class="border border-ink-800 bg-ink-900 p-8">
                <p class="eyebrow">Mission</p>
                <p class="mt-4 leading-relaxed text-neutral-300">
                    {{ $site->mission ?? 'Deliver superior quality aggregates that meet industry standards; provide expert, timely, and cost-efficient concreting services; foster long-term partnerships through integrity and safe practices; and uphold environmental responsibility in sourcing and operations.' }}
                </p>
            </div>
        </div>
    </section>

    {{-- Core values --}}
    <section class="section border-t border-ink-800 bg-ink-900">
        <div class="container-x">
            <div class="max-w-2xl">
                <p class="eyebrow">What Drives Us</p>
                <h2 class="mt-3 text-3xl font-bold uppercase text-white sm:text-4xl">Corporate Values</h2>
            </div>
            <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                @foreach([
                    ['Integrity', 'Transparent and ethical operations in everything we do.'],
                    ['Excellence', 'Commitment to high standards and continuous improvement.'],
                    ['Collaboration', 'Strong teamwork with clients and partners.'],
                    ['Innovation', 'Efficient methods and modern equipment.'],
                ] as $i => $value)
                    <div class="border border-ink-800 bg-ink-950 p-6">
                        <span class="font-display text-4xl font-bold text-hazard-500/40">0{{ $i + 1 }}</span>
                        <h3 class="mt-3 font-display text-xl font-semibold uppercase text-white">{{ $value[0] }}</h3>
                        <p class="mt-2 text-sm leading-relaxed text-neutral-400">{{ $value[1] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Competitive strengths + Quality/Safety --}}
    <section class="section">
        <div class="container-x grid gap-12 lg:grid-cols-2">
            <div>
                <p class="eyebrow">Why Choose Us</p>
                <h2 class="mt-3 text-3xl font-bold uppercase text-white">Competitive Strengths</h2>
                <ul class="mt-8 space-y-4">
                    @foreach([
                        ['Reliable Supply Chain', 'Consistent delivery of aggregates to project sites.'],
                        ['Quality Commitment', 'Materials and workmanship that exceed standards.'],
                        ['Experienced Team', 'Skilled operators, supervisors, and technical staff.'],
                        ['Customer-Centric', 'Flexible scheduling and responsive coordination.'],
                        ['Safety & Compliance', 'Strict onsite safety protocols and certifications.'],
                    ] as $strength)
                        <li class="flex gap-4 border-b border-ink-800 pb-4">
                            <span class="mt-1 h-2 w-2 flex-none bg-hazard-500"></span>
                            <div>
                                <h3 class="font-display text-base font-semibold uppercase tracking-wide text-white">{{ $strength[0] }}</h3>
                                <p class="mt-1 text-sm text-neutral-400">{{ $strength[1] }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div>
                <p class="eyebrow">Responsibility</p>
                <h2 class="mt-3 text-3xl font-bold uppercase text-white">Quality, Safety &amp; Environment</h2>
                <div class="mt-8 space-y-6">
                    <div class="border border-ink-800 bg-ink-900 p-6">
                        <h3 class="font-display text-lg font-semibold uppercase text-white">Safety Policy</h3>
                        <p class="mt-2 text-sm text-neutral-400">Regular training, PPE enforcement, and hazard assessment on every site.</p>
                    </div>
                    <div class="border border-ink-800 bg-ink-900 p-6">
                        <h3 class="font-display text-lg font-semibold uppercase text-white">Quality Assurance</h3>
                        <p class="mt-2 text-sm text-neutral-400">Compliance with local and international standards (DPWH, ASTM), with regular materials testing and inspection.</p>
                    </div>
                    <div class="border border-ink-800 bg-ink-900 p-6">
                        <h3 class="font-display text-lg font-semibold uppercase text-white">Environmental Stewardship</h3>
                        <p class="mt-2 text-sm text-neutral-400">Responsible sourcing with dust and erosion control.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
