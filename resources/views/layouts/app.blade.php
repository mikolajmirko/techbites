<a href="#mainLink" class="sr-only focus:not-sr-only">
  <div class="absolute z-50 rounded-b-lg bg-white text-gray-900 underline py-2 px-3 ml-2">{{{ __('Skip to content', 'tb') }}}</div>
</a>

@include('partials.header')

<div class="flex-grow">
  <div class="w-full">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
      <a id="mainLink" class="block relative -top-24 invisible"></a>
      @yield('content')
    </div>
  </div>
</div>

@include('partials.footer')
