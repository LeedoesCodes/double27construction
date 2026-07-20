<x-layout title="Contact" metaDescription="Contact Double 27 Construction Supply for aggregate supply and concreting services. Head office in Arakan, Cotabato; sub-office in Dauis, Bohol.">
    {{-- Page header --}}
    <section class="border-b border-ink-800 bg-ink-900">
        <div class="container-x py-20 sm:py-24">
            <p class="eyebrow">Get in Touch</p>
            <h1 class="mt-3 text-4xl font-bold uppercase text-white sm:text-5xl">Contact Us</h1>
            <p class="mt-5 max-w-3xl text-lg leading-relaxed text-neutral-300">
                Ready to discuss your aggregate supply or concreting needs? Reach out and our team will respond promptly.
            </p>
        </div>
    </section>

    <section class="section">
        <div class="container-x grid gap-12 lg:grid-cols-5">
            {{-- Contact info --}}
            <div class="lg:col-span-2">
                <div class="space-y-8">
                    @if($site->phone)
                        <div>
                            <p class="eyebrow">Phone</p>
                            <a href="tel:{{ preg_replace('/[^0-9+]/', '', $site->phone) }}" class="mt-2 block font-display text-2xl font-semibold text-white transition hover:text-hazard-400">{{ $site->phone }}</a>
                        </div>
                    @endif
                    @if($site->email)
                        <div>
                            <p class="eyebrow">Email</p>
                            <a href="mailto:{{ $site->email }}" class="mt-2 block text-lg text-white transition hover:text-hazard-400">{{ $site->email }}</a>
                        </div>
                    @endif
                    <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-1">
                        @if($site->head_office)
                            <div class="border border-ink-800 bg-ink-900 p-5">
                                <p class="eyebrow">Head Office</p>
                                <p class="mt-2 text-sm text-neutral-300">{{ $site->head_office }}</p>
                            </div>
                        @endif
                        @if($site->sub_office)
                            <div class="border border-ink-800 bg-ink-900 p-5">
                                <p class="eyebrow">Sub Office</p>
                                <p class="mt-2 text-sm text-neutral-300">{{ $site->sub_office }}</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Contact form --}}
            <div class="lg:col-span-3">
                @if(session('success'))
                    <div class="mb-6 border border-hazard-500 bg-hazard-500/10 p-4 text-sm text-hazard-400">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST" class="space-y-5 border border-ink-800 bg-ink-900 p-6 sm:p-8">
                    @csrf
                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="name" class="mb-2 block text-xs font-semibold uppercase tracking-wider text-neutral-400">Name *</label>
                            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                                class="w-full border border-ink-700 bg-ink-950 px-4 py-3 text-white placeholder-neutral-600 focus:border-hazard-500 focus:outline-none">
                            @error('name')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="phone" class="mb-2 block text-xs font-semibold uppercase tracking-wider text-neutral-400">Phone</label>
                            <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                                class="w-full border border-ink-700 bg-ink-950 px-4 py-3 text-white placeholder-neutral-600 focus:border-hazard-500 focus:outline-none">
                        </div>
                    </div>
                    <div class="grid gap-5 sm:grid-cols-2">
                        <div>
                            <label for="email" class="mb-2 block text-xs font-semibold uppercase tracking-wider text-neutral-400">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}"
                                class="w-full border border-ink-700 bg-ink-950 px-4 py-3 text-white placeholder-neutral-600 focus:border-hazard-500 focus:outline-none">
                            @error('email')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                        </div>
                        <div>
                            <label for="subject" class="mb-2 block text-xs font-semibold uppercase tracking-wider text-neutral-400">Subject</label>
                            <input type="text" id="subject" name="subject" value="{{ old('subject') }}"
                                class="w-full border border-ink-700 bg-ink-950 px-4 py-3 text-white placeholder-neutral-600 focus:border-hazard-500 focus:outline-none">
                        </div>
                    </div>
                    <div>
                        <label for="message" class="mb-2 block text-xs font-semibold uppercase tracking-wider text-neutral-400">Message *</label>
                        <textarea id="message" name="message" rows="5" required
                            class="w-full border border-ink-700 bg-ink-950 px-4 py-3 text-white placeholder-neutral-600 focus:border-hazard-500 focus:outline-none">{{ old('message') }}</textarea>
                        @error('message')<p class="mt-1 text-xs text-red-400">{{ $message }}</p>@enderror
                    </div>
                    <button type="submit" class="btn-primary w-full sm:w-auto">Send Message</button>
                </form>
            </div>
        </div>
    </section>
</x-layout>
