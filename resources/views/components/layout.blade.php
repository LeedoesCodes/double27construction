@props([
    'title' => '',
    'metaDescription' => null,
])

<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#0a0a0b">
    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

    @php($pageTitle = $title !== '' ? $title.' — '.$site->company_name : $site->company_name)
    <title>{{ $pageTitle }}</title>
    <meta name="description" content="{{ $metaDescription ?? $site->tagline ?? 'Quality construction aggregates and concreting services in the Philippines.' }}">

    {{-- Open Graph --}}
    <meta property="og:title" content="{{ $pageTitle }}">
    <meta property="og:description" content="{{ $metaDescription ?? $site->tagline }}">
    <meta property="og:type" content="website">
    @if($site->hero_image)
        <meta property="og:image" content="{{ asset('storage/'.$site->hero_image) }}">
    @endif

    <link rel="preconnect" href="https://fonts.bunny.net">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col">

    @include('partials.nav')

    <main class="flex-1">
        {{ $slot }}
    </main>

    @include('partials.footer')

</body>
</html>
