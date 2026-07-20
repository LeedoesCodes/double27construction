<x-layout title="Projects" metaDescription="Selected projects by Double 27 Construction Supply — aggregate delivery, structural concrete, and road/bridge works across the Philippines.">
    {{-- Page header --}}
    <section class="border-b border-ink-800 bg-ink-900">
        <div class="container-x py-20 sm:py-24">
            <p class="eyebrow">Track Record</p>
            <h1 class="mt-3 text-4xl font-bold uppercase text-white sm:text-5xl">Our Projects</h1>
            <p class="mt-5 max-w-3xl text-lg leading-relaxed text-neutral-300">
                Trusted by construction firms, real estate developers, government agencies, and civil contractors.
            </p>
        </div>
    </section>

    {{-- Projects grid --}}
    <section class="section">
        <div class="container-x">
            @if($projects->isNotEmpty())
                <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach($projects as $project)
                        <div class="group flex flex-col overflow-hidden border border-ink-800 bg-ink-900">
                            <div class="aspect-[16/10] overflow-hidden">
                                @if($project->image)
                                    <img src="{{ asset('storage/'.$project->image) }}" alt="{{ $project->name }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                                @else
                                    <div class="flex h-full w-full items-center justify-center bg-ink-800 text-ink-600"><span class="font-display text-6xl">27</span></div>
                                @endif
                            </div>
                            <div class="flex flex-1 flex-col p-6">
                                <div class="flex items-center gap-2 text-xs uppercase tracking-widest text-hazard-500">
                                    <span>{{ $project->client }}</span>
                                    @if($project->year)<span class="text-neutral-600">/ {{ $project->year }}</span>@endif
                                </div>
                                <h3 class="mt-2 font-display text-xl font-semibold uppercase text-white">{{ $project->name }}</h3>
                                @if($project->scope)<p class="mt-2 text-sm text-neutral-400">{{ $project->scope }}</p>@endif
                                @if($project->location)<p class="mt-3 text-xs uppercase tracking-wider text-neutral-500">{{ $project->location }}</p>@endif
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-neutral-500">Projects will be listed here soon.</p>
            @endif
        </div>
    </section>

    {{-- Gallery --}}
    @if($gallery->isNotEmpty())
    <section class="section border-t border-ink-800 bg-ink-900">
        <div class="container-x">
            <div class="max-w-2xl">
                <p class="eyebrow">On Site</p>
                <h2 class="mt-3 text-3xl font-bold uppercase text-white sm:text-4xl">Gallery</h2>
            </div>
            <div class="mt-12 grid grid-cols-2 gap-4 md:grid-cols-3 lg:grid-cols-4">
                @foreach($gallery as $photo)
                    <figure class="group relative aspect-square overflow-hidden border border-ink-800">
                        <img src="{{ asset('storage/'.$photo->image) }}" alt="{{ $photo->caption ?? 'Double 27 site photo' }}" class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                        @if($photo->caption)
                            <figcaption class="absolute inset-x-0 bottom-0 bg-gradient-to-t from-ink-950 to-transparent p-3 text-xs text-neutral-200">{{ $photo->caption }}</figcaption>
                        @endif
                    </figure>
                @endforeach
            </div>
        </div>
    </section>
    @endif
</x-layout>
