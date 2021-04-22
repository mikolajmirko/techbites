@extends('layouts.app')

@section('content')
  <main aria-label="{{{ __('Website main content', 'tb') }}}">
    <div class="h-6"></div>
    <?php
      $categories = [];
      foreach (wp_get_nav_menu_items($category_menu_id) as $menu_item) {
        $category = get_category($menu_item->object_id);
        $categories[$category->slug] = $category;
      }
    ?>
    {{-- Category diagram --}}
    @include('graphic::hex_bg')
    <h1 class="text-dark font-semibold text-3xl mb-1 mt-4 lg:mt-2 text-center">{{ __('Discover the process', 'tb') }}</h1>
    <p class="text-gray-600 dark:text-dark w-full text-center mb-6 text-sm px-4">{{ __('Every phase of the development process can improve user experience.', 'tb') }}</p>
    <div class="px-4 lg:px-12 lg:py-8 flex flex-wrap lg:flex-nowrap">
      <div class="hidden sm:block sm:w-1/2 lg:w-96 sm:pr-6 order-2 lg:order-1">
        @include('partials.diagram-element', ['category' => 'study'])
        @include('partials.diagram-element', ['category' => 'vision'])
        @include('partials.diagram-element', ['category' => 'evaluation'])
      </div>
      <div x-data="openDiagramDialogLink()" x-on:resize.window="resizeUpdate" class="w-full lg:w-96 flex-shrink-0 order-1 lg:order-2 relative">
        @include('graphic::diagram', ['classes' => 'h-80 w-auto lg:h-96 mx-auto mb-6 lg:mb-0 overflow-visible'])
        <div x-show="openDiagramModal" x-on:click.away="close" class="bg-white absolute w-full z-10 top-0 transform origin-top translate-y-1/4 shadow-2xl rounded-md p-4" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-90">
          <button x-on:click="close" id="closeDiagramDialogBtn" type="button" class="bg-white rounded-lg p-2 float-right inline-flex items-center justify-center text-gray-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500 dark:focus:ring-accent" >
            <span class="sr-only">{{{ __('Close menu', 'tb') }}}</span>
            @include('icon::close', ['classes' => 'h-8 w-8'])
          </button>
          <div class="h-4"></div>
          <div :class="{ 'hidden': cat !== 'study' }">
            @include('partials.diagram-element', ['category' => 'study', 'justtext' => true])
          </div>
          <div :class="{ 'hidden': cat !== 'vision' }">
            @include('partials.diagram-element', ['category' => 'vision', 'justtext' => true])
          </div>
          <div :class="{ 'hidden': cat !== 'evaluation' }">
            @include('partials.diagram-element', ['category' => 'evaluation', 'justtext' => true])
          </div>
          <div :class="{ 'hidden': cat !== 'concept' }">
            @include('partials.diagram-element', ['category' => 'concept', 'justtext' => true])
          </div>
          <div :class="{ 'hidden': cat !== 'design' }">
            @include('partials.diagram-element', ['category' => 'design', 'justtext' => true])
          </div>
          <div :class="{ 'hidden': cat !== 'development' }">
            @include('partials.diagram-element', ['category' => 'development', 'justtext' => true])
          </div>
          <a x-bind:href="'{{ get_home_url() }}/category/' + cat" x-on:focusout="close" class="flex h-12 px-6 my-2 mx-4 float-right justify-center items-center shadow-md rounded-md text-white bg-primary dark:bg-accent focus:outline-none focus:ring-2 focus:ring-offset-white focus:ring-offset-2 focus:ring-primary dark:focus:ring-accent" aria-label="{{{ __('Discover this phase', 'tb') }}}">
            <span>{{ __('Discover this phase', 'tb') }}</span>
            @include('icon::arrow', ['classes' => 'h-6 w-6 ml-2 transform rotate-90'])
          </a>
        </div>
      </div>
      <div class="hidden sm:block sm:w-1/2 lg:w-96 sm:pl-6 order-3 sm:text-right">
        @include('partials.diagram-element', ['category' => 'concept'])
        @include('partials.diagram-element', ['category' => 'design'])
        @include('partials.diagram-element', ['category' => 'development'])
      </div>
    </div>
    {{-- Newest --}}
    <?php
      $category = get_queried_object();
      $args = array(
        'posts_per_page' => 3,
        'ignore_sticky_posts' => 1,
        'category__not_in' => array(7),
        'orderby' => 'date',
        'post_type' => 'post'
      );
      $query = new WP_Query($args);
    ?>
    @if($query->have_posts())
      <h1 class="text-dark font-semibold text-3xl mb-1 mt-2 text-center">{{ __('The new and tasty bites', 'tb') }}</h1>
      <p class="text-gray-600 dark:text-dark w-full text-center mb-6 text-sm px-4">{{ __('Check out the latest posts and always expect more to come!', 'tb') }}</p>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 px-4">
        @while($query->have_posts()) @php($query->the_post())
          @include('components.post-card')
        @endwhile
      </div>
    @endif
    <?php
      wp_reset_query();
    ?>
    {{-- Newest --}}
    <?php
      $category = get_queried_object();
      $args = array(
        'posts_per_page' => 3,
        'ignore_sticky_posts' => 1,
        'category__not_in' => array(7),
        'orderby' => 'rand',
        'post_type' => 'post'
      );
      $query = new WP_Query($args);
    ?>
    @if($query->have_posts())
      <h1 class="text-dark font-semibold text-3xl mb-1 mt-8 text-center">{{ __('Random snacks', 'tb') }}</h1>
      <p class="text-gray-600 dark:text-dark w-full text-center mb-6 text-sm px-4">{{ __('You don\'t know what you fancy? Look at these!', 'tb') }}</p>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 px-4">
        @while($query->have_posts()) @php($query->the_post())
          @include('components.post-card')
        @endwhile
      </div>
    @endif
    <?php
      wp_reset_query();
    ?>
  </main>
  <div class="h-16"></div>
@endsection
