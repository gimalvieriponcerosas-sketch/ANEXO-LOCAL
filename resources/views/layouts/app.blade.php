<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title', 'SANTRIX ANEXO LOCAL')</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700|space-grotesk:500,700" rel="stylesheet" />
            @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="min-h-screen antialiased">
        <div class="min-h-screen lg:flex">
            <aside class="bg-slate-950 text-slate-100 lg:sticky lg:top-0 lg:h-screen lg:w-72 lg:shrink-0">
                <div class="flex min-h-20 items-center gap-3 border-b border-white/10 px-5 py-4 sm:px-7 lg:min-h-24">
                    <div class="flex size-11 shrink-0 items-center justify-center rounded-xl bg-teal-400/15 font-display text-lg font-bold text-teal-200 ring-1 ring-inset ring-teal-300/20">
                        S
                    </div>
                    <div>
                        <p class="text-[10px] font-bold uppercase tracking-[0.24em] text-teal-300">SANTRIX</p>
                        <h1 class="mt-0.5 font-display text-base font-bold tracking-wide text-white">ANEXO LOCAL</h1>
                    </div>
                </div>

                <nav aria-label="Navegación principal" class="grid grid-cols-2 gap-2 p-3 sm:grid-cols-4 lg:grid-cols-1 lg:gap-1.5 lg:px-3 lg:py-7">
                    <p class="col-span-full hidden px-3 pb-2 text-[10px] font-bold uppercase tracking-[0.2em] text-slate-500 lg:block">Menú principal</p>
                    <a href="{{ route('dashboard') }}" @class(['nav-link', 'nav-link-active' => request()->routeIs('dashboard')]) @if (request()->routeIs('dashboard')) aria-current="page" @endif>Panel principal</a>
                    <a href="{{ route('anexos.index') }}" @class(['nav-link', 'nav-link-active' => request()->routeIs('anexos.*')]) @if (request()->routeIs('anexos.*')) aria-current="page" @endif>Configuración del Anexo</a>
                    <a href="{{ route('registros.index') }}" @class(['nav-link', 'nav-link-active' => request()->routeIs('registros.*')]) @if (request()->routeIs('registros.*')) aria-current="page" @endif>Registros Anexo A</a>
                    <a href="{{ route('importaciones.create') }}" @class(['nav-link', 'nav-link-active' => request()->routeIs('importaciones.*')]) @if (request()->routeIs('importaciones.*')) aria-current="page" @endif>Importar Excel</a>
                </nav>

                <div class="mx-5 hidden rounded-xl border border-white/10 bg-white/[0.04] p-4 lg:mt-auto lg:block">
                    <p class="text-xs font-semibold text-slate-300">Gestión de entregables</p>
                    <p class="mt-1 text-xs leading-5 text-slate-500">Organiza la información del Anexo A en un solo lugar.</p>
                </div>
            </aside>

            <div class="min-w-0 flex-1">
                <header class="sticky top-0 z-10 border-b border-slate-200/80 bg-white/90 backdrop-blur-xl">
                    <div class="mx-auto flex min-h-20 max-w-[1600px] items-center justify-between gap-4 px-4 py-4 sm:px-6 lg:px-10">
                        <div>
                            <p class="text-xs font-semibold text-slate-400">Sistema de gestión <span class="px-1 text-slate-300">/</span> Anexo A</p>
                            <h2 class="mt-1 font-display text-xl font-bold tracking-tight text-slate-900 sm:text-2xl">@yield('page-title', 'SANTRIX ANEXO LOCAL')</h2>
                        </div>
                        <div class="hidden items-center gap-2.5 rounded-xl border border-slate-200 bg-white px-3.5 py-2.5 text-sm text-slate-600 shadow-sm sm:flex">
                            <span class="size-2 rounded-full bg-emerald-500 ring-4 ring-emerald-500/10"></span>
                            <time datetime="{{ now()->toIso8601String() }}" class="font-medium">{{ now()->translatedFormat('d M Y') }}</time>
                        </div>
                    </div>
                </header>

                <main class="mx-auto max-w-[1600px] px-4 py-6 sm:px-6 sm:py-8 lg:px-10 lg:py-9">
                    @if (session('success'))
                        <div class="mb-6 rounded-2xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="mb-6 rounded-2xl border border-rose-200 bg-rose-50 px-4 py-3 text-sm text-rose-700">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="mb-6 rounded-2xl border border-amber-200 bg-amber-50 px-4 py-3 text-sm text-amber-800">
                            <p class="font-semibold">Revisa los campos del formulario.</p>
                            <ul class="mt-2 list-disc space-y-1 pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @yield('content')
                </main>
            </div>
        </div>
    </body>
</html>
