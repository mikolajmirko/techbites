@if ($variant == 'with-popup')
  <div class="relative" x-data="{ searchOpen: false }">
    <button x-on:click="searchOpen = true; $nextTick(() => { $refs.searchField.focus() })" type="button" class="shadow-md rounded-md p-2 inline-flex items-center justify-center bg-white text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-blue-600 dark:ring-offset-dark focus:ring-white hover:bg-gray-100" x-bind:aria-expanded="searchOpen ? 'true' : 'false'" id="search-box" aria-haspopup="true">
      <span class="sr-only">{{{ __('Search for bites', 'tb') }}}</span>
      @include('icon::search', ['classes' => 'h-6 w-6'])
    </button>
    <div x-cloak x-show="searchOpen" @click.away="searchOpen = false" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90" class="origin-top-right absolute z-10 mt-2 ml-5 transform w-screen max-w-md left-1/2 -translate-x-full" role="dialog" aria-labelledby="search-box">
      <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden max-w-md bg-white">
        <div class="relative bg-white px-6 py-5">
@endif

  <form autocomplete="off" action="{{ get_permalink($catalog_page_id) }}" role="search" method="get">
    <label for="searchField-{{$variant}}{{ isset($mobile) ? '-mobile' : '' }}" class="pb-2 text-sm sr-only text-white">
      {{{ __('Search for bites', 'tb') }}}
    </label>
    <div class="flex items-center search-form">
      <input id="searchField-{{$variant}}{{ isset($mobile) ? '-mobile' : '' }}" x-ref="searchField" type="search" name="s" placeholder="{{{ __('Search...', 'tb') }}}" value="{{{ get_search_query() }}}" class="flex-grow w-4/5 mr-2 focus:outline-none shadow-md border-2 border-gray-300 dark:border-gray-500 focus:border-primary dark:focus:border-accent rounded-md h-12 px-4 dark:placeholder-black focus:ring-0" autocomplete="false">
      <button type="submit" class="flex w-12 h-12 justify-center items-center shadow-md rounded-md text-white bg-dark dark:bg-accent hover:dark dark:hover:bg-accent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary dark:focus:ring-accent" aria-label="{{{ __('Search...', 'tb') }}}">
        @include('icon::search', ['classes' => 'h-6 w-6'])
      </button>
    </div>
  </form>

@if ($variant == 'with-popup')
          <div id="dynamicSearchFetch" class="pt-2"></div>
        </div>
        <div class="px-5 py-3 bg-gray-100 space-y-6">
          <a href="{{{ get_permalink($catalog_page_id) }}}" class="px-4 py-3 flex flex-grow items-center text-base font-medium text-gray-800 rounded-md focus:outline-none focus:ring-2 focus:ring-primary dark:focus:ring-accent">
            @include('icon::advanced-search', ['classes' => 'h-6 w-6 flex-shrink-0 text-gray-600 dark:text-gray-800 transform -rotate-90'])
            <span class="ml-4">{{{ __('Advanced search', 'tb') }}}</span>
          </a>
        </div>
      </div>
    </div>
  </div>
@endif
