@if (is_front_page())
  <x-hero
    title="{!! __('Technology doesn\'t bite', 'tb') !!}"
    description="{{{ __('Discover and share knowledge about software usability, technology availability and interesting sources of resources.', 'tb') }}}"
    graphic="frontpage"
  >
    <div class="w-32 h-1 bg-accent rounded-md md:mx-0 mx-auto"></div>
    <div class="relative py-4 px-4 w-full sm:px-0">
      @include('components.search-box', ['variant' => 'without-popup'])
      <a href="{{ get_permalink($catalog_page_id) }}" class="flex items-center justify-center md:justify-start text-white font-semibold text-base mt-2 focus:outline-none focus:underline hover:underline">
        <span>{{{ __('Advanced search', 'tb') }}}</span>
        @include('icon::double-chevron', ['classes' => 'ml-2 h-4 w-4'])
      </a>
    </div>
  </x-hero>
@elseif (is_category())
  @if (is_category($category_none_id))
    <x-hero />
  @else
    <?php
      $cat = get_category( get_query_var( 'cat' ) );
    ?>
    <x-hero
      title="{{ __('Discover', 'tb') }}: {{ $cat->name }}"
      description="{{ $cat->description }}"
      graphic="process.{{ $cat->slug }}"
    />
  @endif
@elseif (is_author() or is_date())
  <x-hero
    title="{!! get_the_archive_title() !!}"
    description=""
  />
@elseif (is_home())
  <x-hero
    title="{{{ __('Bite catalog', 'tb') }}}"
    description="{{{ __('Search among dozens of bites containing rich and detailed knowledge in the field of IT product development.', 'tb') }}}"
    graphic="catalog"
  />
@elseif (is_page($about_page_id))
  <x-hero
    title="{{{ __('Our goal', 'tb') }}}"
    description="{{{ __('We hope to popularize the concepts of usability and accessibility in IT projects and change the belief that if something is aesthetic it must be inaccessible.', 'tb') }}}"
    graphic="about"
  />
@elseif (is_single() && $is_translated)
  <x-hero
    title="{{{ __('We have a small problem', 'tb') }}}"
    description="{{{ __('Sorry, this bite has no translation in selected language. Try a different one or search for other bites.', 'tb') }}}"
    graphic="missing-language"
  />
@elseif (is_404())
  <x-hero
    title="{{{ __('Page not found', 'tb') }}}"
    description="{{{ __('Someone was very hungry and bit too much! The page you are trying to view does not exist. Use main navigation or search to discover the best bites.', 'tb') }}}"
    graphic="404"
  >
    <a href="{{ home_url('/') }}" class="flex h-12 px-5 justify-center items-center shadow-md rounded-md text-white bg-dark dark:bg-accent hover:dark dark:hover:bg-accent focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary dark:focus:ring-accent" aria-label="{{{ __('Home page', 'tb') }}}">
      @include('icon::arrow', ['classes' => 'h-6 w-6 transform -rotate-90'])
      <span class="ml-3">{{ __('Home page', 'tb') }}</span>
    </a>
  </x-hero>
@else
  <x-hero />
@endif
@include('graphic::wave')
