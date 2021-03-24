@if (is_front_page())
  <div class="max-w-7xl mx-auto px-4 sm:px-6 pb-8 md:pb-4 pt-24 lg:pt-8">
    <div class="container mx-auto flex flex-wrap flex-col md:flex-row items-center justify-between lg:px-4 mt-0 md:my-2 lg:-mb-32">
      <div role="region" aria-label="{{{ __('Page hero', 'tb') }}}" class="flex flex-col w-full lg:w-1/2 xl:w-2/5 justify-center items-start text-center md:text-left lg:pr-12 xl:pr-0 lg:mb-10">
        <h1 class="my-4 text-3xl sm:text-4xl font-bold leading-tight w-full text-white">Technologia nie gryzie</h1>
        <p class="leading-normal text-medium mb-4 text-white sm:text-lg">Odkrywaj i dziel się wiedzą o użyteczności oprogramowania, dostępności technologii oraz ciekawych źródłach zasobów.</p>
        <div class="w-32 h-1 bg-pink-500 rounded-md md:mx-0 mx-auto"></div>
        <div class="relative py-4 px-4 w-full sm:px-0">
          <form action="#" class="flex items-center md:justify-start justify-center">
            <input x-ref="searchField" type="text" name="search" id="search" placeholder="Szukaj gryzków..." class="mr-2 flex-grow focus:outline-none w-4/5 shadow-md border-2 border-blue-200 focus:border-pink-500 rounded-md h-12 px-4" style="max-width: 28rem;">
            <button type="submit" class="flex w-12 h-12 justify-center items-center shadow-md rounded-md text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-blue-500 focus:ring-white" style="background-color: #1E293B;">
              @include('icon::search', ['classes' => 'h-6 w-6'])
            </button>
          </form>
          <a href="#" class="flex items-center justify-center md:justify-start text-white font-semibold text-base mt-2 focus:outline-none focus:underline hover:underline">
            Wyszukiwanie zaawansowane
            @include('icon::double-chevron', ['classes' => 'ml-2 h-4 w-4'])
          </a>
        </div>
      </div>
      <div class="hidden lg:flex lg:flex-grow lg:w-1/2 xl:w-3/5 justify-center text-white">
        @include('graphic::frontpage-hero', ['classes' => 'relative w-4/5 lg:w-full max-w-lg select-none pointer-events-none'])
      </div>
    </div>
  </div>
@elseif (is_search())
  <div class="max-w-7xl mx-auto px-4 sm:px-6 pb-8 md:pb-4 pt-24">
    <p class="leading-normal text-medium mb-4 text-white sm:text-lg">

    </p>
  </div>
@elseif (is_404())
  <div class="max-w-7xl mx-auto px-4 sm:px-6 pb-8 md:pb-4 pt-24">
    <p class="leading-normal text-medium mb-4 text-white sm:text-lg">

    </p>
  </div>
@else
  <div class="pt-24"></div>
@endif
@include('graphic::wave')
