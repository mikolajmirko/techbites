<a href="#main" class="sr-only focus:not-sr-only">
  <div class="absolute z-50 rounded-b-lg bg-white text-gray-900 underline py-2 px-3 ml-2">{{{ __('Skip to content', 'tb') }}}</div>
</a>

@include('partials.header')

<div class="flex-grow">
  <div class="w-full">
    <main id="main" class="max-w-7xl mx-auto px-4 sm:px-6" aria-label="{{{ __('Website main content', 'tb') }}}">
      @yield('content')
    </main>
  </div>
</div>

@include('partials.footer')
