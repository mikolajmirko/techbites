<a href="#main" class="sr-only focus:not-sr-only">
  <div class="absolute z-50 rounded-b-lg bg-white text-gray-900 underline py-2 px-3 ml-2">{{ __('Skip to content', 'tb') }}</div>
</a>

<div class="max-w-3xl mx-auto">

  @include('partials.header')

    {!! do_action('sublanguage_print_language_switch'); !!}

    <main id="main" class="py-8 prose main">
      @yield('content')
    </main>

    @hasSection('sidebar')
      <aside class="sidebar">
        @yield('sidebar')
      </aside>
    @endif

  @include('partials.footer')
</div>
