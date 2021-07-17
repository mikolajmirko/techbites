@if ($variant == 'with-popup')
  <div class="relative ml-2" x-data="{ darkModeOpen: false }">
    <button type="button" id="darkMode-box" x-on:mouseenter="darkModeOpen = true" x-on:mouseleave="darkModeOpen = false" x-on:focusin="darkModeOpen = true" x-on:focusout="darkModeOpen = false" class="highContrastModeToggle shadow-md rounded-md p-2 inline-flex items-center justify-center text-white bg-gray-900 hover:bg-gray-800 dark:bg-accent dark:hover:bg-accent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-blue-600 dark:focus:ring-offset-dark focus:ring-gray-900 dark:focus:ring-accent">
      <span class="sr-only" aria-live="polite">{{{ __('High contrast mode', 'tb') }}} <strong class="hidden dark:inline">{{{ __('On', 'tb') }}}</strong><strong class="dark:hidden inline">{{{ __('Off', 'tb') }}}</strong></span>
      @include('icon::contrast', ['classes' => 'h-6 w-6 transform transition dark:rotate-180'])
    </button>
    <div x-cloak x-show="darkModeOpen" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" class="origin-top-right absolute z-10 mt-2 transform w-56 right-0" aria-labelledby="darkMode-box">
      <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden bg-white py-2 px-4 text-center text-sm">
        {{{ __('High contrast mode', 'tb') }}}: <strong class="hidden dark:inline">{{{ __('On', 'tb') }}}</strong><strong class="dark:hidden inline">{{{ __('Off', 'tb') }}}</strong>
      </div>
    </div>
  </div>
@else
  <button type="submit" class="highContrastModeToggle flex w-10 h-10 justify-center items-center shadow-md rounded-md text-white bg-gray-900 hover:bg-gray-800 dark:bg-accent dark:hover:bg-accent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-900 dark:focus:ring-accent">
    <span class="sr-only">{{{ __('High contrast mode', 'tb') }}}</span>
    @include('icon::contrast', ['classes' => 'h-6 w-6 transform transition dark:rotate-180'])
  </button>
@endif
