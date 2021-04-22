<div class="w-full bg-dark">
  @include('graphic::wave', ['classes' => 'transform rotate-180'])
  <footer class="max-w-7xl mx-auto px-4 sm:px-6 py-8" aria-label="{{{ __('Website footer', 'tb') }}}">
    <img class="h-12 w-auto mx-auto" src="@asset('images/logo.svg')" alt="{{ __('Portal logo', 'tb') }}">
    @if (has_nav_menu('bottom_navigation'))
      {!! wp_nav_menu([
        'container_aria_label' => 'Nawigacja dolna',
        'theme_location' => 'bottom_navigation',
        'menu_class' => 'text-light text-lg flex justify-center text-center flex-col md:flex-row py-4',
        'echo' => false
        ]) !!}
    @endif
    <div class="text-gray-400 text-md text-center my-2">
      © {{{ date('Y') }}} {{{ $siteName }}}
    </div>
    <div id="goUpButton" class="fixed right-4 -bottom-12" aria-hidden="true" x-data="{ goUpOpen: false }">
      <button x-on:mouseenter="goUpOpen = true" x-on:mouseleave="goUpOpen = false" x-on:focusin="goUpOpen = true" x-on:focusout="goUpOpen = false" type="button" class="rounded-md shadow-md p-2 mr-2 inline-flex items-center justify-center text-white bg-primary dark:bg-accent hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-white" tabindex="-1">
        <span class="sr-only">{{{ __('Back to top', 'tb') }}}</span>
        @include('icon::arrow', ['classes' => 'h-7 w-7'])
      </button>
      <div
          x-show="goUpOpen"
          x-transition:enter="transition ease-out duration-100"
          x-transition:enter-start="opacity-0 scale-90"
          x-transition:enter-end="opacity-100 scale-100"
          x-transition:leave="transition ease-in duration-100"
          x-transition:leave-start="opacity-100 scale-100"
          x-transition:leave-end="opacity-0 scale-90"
          class="origin-bottom-right absolute z-10 transform w-48 right-16 bottom-1"
      >
        <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden bg-white py-2 px-4 text-center text-sm">
          {{{ __('Back to top', 'tb') }}}
        </div>
      </div>
    </div>
  </footer>
</div>
