<div class="bg-primary bg-gradient-to-b from-primary via-primary to-primaryAltered dark:bg-none dark:bg-dark transition">
  <div x-data="{ mobileMenuOpen: false}" class="fixed z-40 w-full" id="stickyHeader">
    <header class="max-w-7xl mx-auto px-4 sm:px-6" aria-label="{{{ __('Website header', 'tb') }}}">
      <div class="flex justify-between items-center py-4 md:justify-start md:space-x-8">
        {{-- Website logo --}}
        <div class="flex justify-start">
          <a href="{{ home_url('/') }}" class="rounded-sm p-2 focus:outline-none focus:ring-2 focus:ring-white" id="portalLogo">
            <span class="sr-only">{{ $siteName }}</span>
            <img class="h-10 w-auto sm:h-14 sm:hidden lg:block select-none" src="@asset('images/logo.svg')" alt="{{ __('Portal logo', 'tb') }}">
            <img class="h-10 w-auto sm:h-12 hidden sm:block lg:hidden select-none" src="@asset('images/logo-icon.svg')" alt="{{ __('Portal logo', 'tb') }}">
          </a>
        </div>
        {{-- Main navigation --}}
        <nav class="hidden md:flex space-x-4" aria-label="{{{ __('Main navigation', 'tb') }}}">
          {{-- Discovery popup --}}
          <div class="relative" x-data="{ discoveryMenuOpen: false}">
            <button @click="discoveryMenuOpen = true" type="button" class="text-white rounded-sm inline-flex items-center text-base font-semibold hover:text-gray-50 focus:outline-none focus:ring-2 focus:ring-white py-2 px-3" x-bind:aria-expanded="discoveryMenuOpen ? 'true' : 'false'">
              @include('icon::chevron', ['classes' => 'text-gray-50 h-5 w-5 hover:text-gray-100 hidden lg:block transform transition', 'attributes' => 'x-bind:class={"rotate-180":discoveryMenuOpen}'])
              <span class="lg:ml-3 mb-1 whitespace-nowrap">{{ __('Discover', 'tb') }}</span>
            </button>
            <div x-show="discoveryMenuOpen" @click.away="discoveryMenuOpen = false" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" class="absolute z-10 -ml-4 mt-3 transform w-screen max-w-lg sm:px-0 lg:ml-0 lg:left-1/2 lg:-translate-x-1/2">
              <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden">
                <div class="relative grid gap-6 bg-white pr-8 py-8 sm:gap-8" role="navigation" aria-label="{{{ __('Category navigation', 'tb') }}}">
                  @foreach (wp_get_nav_menu_items($category_menu_id) as $menu_item)
                    <?php
                      $category = get_term($menu_item->object_id);
                    ?>
                    <a role="listitem" href="{{ get_category_link($category) }}" class="-m-3 ml-0 flex items-start hover:bg-gray-50 rounded-r-sm focus:outline-none focus:ring-2 focus:ring-primary dark:focus:ring-accent py-2 pr-2">
                      <div class="h-10 w-1 rounded-r-md mr-4 flex-shrink-0" style="background-color: {{ $category_colors[$category->slug] }}"></div>
                      @include('icon::process.' . $category->slug, ['classes' => 'flex-shrink-0 h-10 w-10 text-dark'])
                      <div class="ml-4">
                        <p class="text-base font-medium text-gray-900">
                          {{{ $category->name }}}
                        </p>
                        <p class="mt-1 text-sm text-gray-500 dark:text-gray-900">
                          {{{ $category->description }}}
                        </p>
                      </div>
                    </a>
                  @endforeach
                </div>
                <div class="px-5 py-3 bg-gray-100 space-y-6">
                  <a role="listitem" href="?random=1" class="px-4 py-3 flex flex-grow items-center text-base font-medium text-gray-800 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:focus:ring-accent">
                    @include('icon::random', ['classes' => 'flex-shrink-0 h-6 w-6 text-gray-600 dark:text-gray-800'])
                    <span class="ml-4">{{ __('Random bite', 'tb') }}</span>
                  </a>
                </div>
              </div>
            </div>
          </div>
          {{-- Catalog link --}}
          <a href="{{ get_permalink($catalog_page_id) }}" class="inline-flex items-center font-medium text-white hover:text-gray-50 rounded-sm focus:outline-none focus:ring-2 focus:ring-white py-2 px-3 whitespace-nowrap">
            @include('icon::catalog', ['classes' => 'text-gray-50 ml-1 h-5 w-5 hover:text-gray-100 hidden lg:block'])
            <span class="lg:ml-3 mb-1 whitespace-nowrap select-none">{{{ get_the_title($catalog_page_id) }}}</span>
          </a>
          {{-- About link --}}
          <a href="{{ get_permalink($about_page_id) }}" class="inline-flex items-center font-medium text-white hover:text-gray-50 rounded-sm focus:outline-none focus:ring-2 focus:ring-white py-2 px-3 whitespace-nowrap">
            @include('icon::about', ['classes' => 'text-gray-50 ml-1 h-5 w-5 hover:text-gray-100 hidden lg:block'])
            <span class="lg:ml-3 mb-1 whitespace-nowrap select-none">{{{ get_the_title($about_page_id) }}}</span>
          </a>
        </nav>
        {{-- Additional actions --}}
        <div class="hidden md:flex items-center justify-end md:flex-1 lg:w-0">
          @include('components.search-box', ['variant' => 'with-popup'])
          @include('components.mode-switcher', ['variant' => 'with-popup'])
          @include('components.language-switcher', ['variant' => 'dropdown'])
        </div>
        {{-- Mobile menu button --}}
        <div class="-mr-2 -my-2 md:hidden">
          <button @click="mobileMenuOpen = true" type="button" class="rounded-md p-2 mr-2 inline-flex items-center justify-center text-white hover:bg-blue-700 dark:hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-white" x-bind:aria-expanded="mobileMenuOpen ? 'true' : 'false'">
            <span class="sr-only">{{{ __('Open menu', 'tb') }}}</span>
            @include('icon::hamburger', ['classes' => 'h-7 w-7'])
          </button>
        </div>
      </div>
    </header>
    <div x-show="mobileMenuOpen" @click.away="mobileMenuOpen = true" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0 scale-90"      x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" class="absolute top-0 inset-x-0 p-2 transition transform origin-top-right md:hidden">
      <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 bg-white divide-y-2 divide-gray-50 dark:divide-gray-300">
        {{-- Website logo & close button --}}
        <div class="flex items-center justify-between pt-5 pb-5 px-6">
          <a href="{{ home_url('/') }}" class="rounded-sm focus:outline-none focus:ring-2 focus:ring-offset-8 focus:ring-offset-white focus:ring-blue-600 dark:focus:ring-accent">
            <span class="sr-only">{{ $siteName }}</span>
            <img class="h-8 w-auto sm:h-10 select-none" src="@asset('images/logo-dark.svg')" alt="{{ __('Portal logo', 'tb') }}">
          </a>
          <button @click="mobileMenuOpen = false" type="button" class="bg-white rounded-md p-2 inline-flex items-center justify-center text-gray-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500 dark:focus:ring-accent">
            <span class="sr-only">{{{ __('Close menu', 'tb') }}}</span>
            @include('icon::close', ['classes' => 'h-8 w-8'])
          </button>
        </div>
        {{-- Discover categories --}}
        <div class="pt-4 pb-4 px-6">
          <nav class="grid grid-cols-1 sm:grid-cols-2 gap-y-1 gap-x-4">
            @foreach (wp_get_nav_menu_items($category_menu_id) as $menu_item)
              <?php
                $category = get_category($menu_item->object_id);
              ?>
              <a role="listitem" href="{{ get_category_link($category) }}" class="py-1 px-2 sm:py-3 flex items-center rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500 dark:focus:ring-accent">
                @include('icon::process.' . $category->slug, ['classes' => 'flex-shrink-0 h-6 w-6 sm:h-8 sm:w-8 text-primary dark:text-accent transition'])
                <span class="ml-3 text-base font-medium text-gray-900">
                  {{{ $category->name }}}
                </span>
              </a>
            @endforeach
          </nav>
        </div>
        {{-- The rest of naviagtion & search --}}
        <div class="py-4 px-6 space-y-6">
          <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-1 gap-x-4">
            <a href="{{ get_permalink($catalog_page_id) }}" class="py-1 px-2 sm:py-3 flex items-center rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary dark:focus:ring-accent">
              @include('icon::catalog', ['classes' => 'text-blue-600 ml-1 h-4 w-4 sm:h-5 sm:w-5 dark:text-accent'])
              <span class="ml-4 text-base font-medium whitespace-nowrap">{{{ get_the_title($catalog_page_id) }}}</span>
            </a>
            <a href="{{ get_permalink($about_page_id) }}" class="py-1 px-2 sm:py-3 flex items-center rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary dark:focus:ring-accent">
              @include('icon::about', ['classes' => 'text-blue-600 ml-1 h-4 w-4 sm:h-5 sm:w-5 dark:text-accent'])
              <span class="ml-4 text-base font-medium whitespace-nowrap">{{{ get_the_title($about_page_id) }}}</span>
            </a>
            <a href="?random=1" class="py-1 px-2 sm:py-3 flex items-center rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-primary dark:focus:ring-accent">
              @include('icon::random', ['classes' => 'text-blue-600 ml-1 h-4 w-4 sm:h-5 sm:w-5 dark:text-accent'])
              <span class="ml-4 text-base font-medium whitespace-nowrap">{{ __('Random bite', 'tb') }}</span>
            </a>
          </div>
          @include('components.search-box', ['variant' => 'without-popup', 'mobile' => 'true'])
        </div>
        {{-- High contrast mode button & language switcher --}}
        <div class="flex p-4 px-6">
          @include('components.mode-switcher', ['variant' => 'button-only'])
          <div class="flex flex-grow justify-end">
            @include('components.language-switcher', ['variant' => 'list'])
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('partials.banner')
</div>
