<a href="#mainLink" class="sr-only focus:not-sr-only">
  <div class="absolute z-50 rounded-b-lg bg-white text-gray-900 underline py-2 px-3 ml-2">{{{ __('Skip to content', 'tb') }}}</div>
</a>

@include('partials.header')

<div class="flex-grow">
  <div class="w-full">
    @if (is_front_page())
      <div class="hidden md:flex w-full overflow-hidden absolute justify-center" style="z-index: -1">
        @include('graphic::hex_bg')
      </div>
    @endif
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
      <div id="mainLink" class="block relative -top-24 invisible"></div>
      @yield('content')
    </div>
  </div>
</div>

@include('partials.footer')
