@extends('layouts.app')

@section('content')
  <div class="flex flex-col-reverse lg:flex-row">
    <main class="flex-grow px-3" aria-label="{{{ __('Website main content', 'tb') }}}">
      @if (!have_posts())
        <div class="text-center my-20 mb-56">
          @include('icon::search', ['classes' => 'h-14 w-14 mx-auto text-dark mb-4'])
          <span class="">{{{ __('Sorry, no results were found.', 'tb') }}}</span>
        </div>
        {{-- Random --}}
        <?php
          $category = get_queried_object();
          $args = array(
            'posts_per_page' => 2,
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
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4 px-4">
            @while($query->have_posts()) @php($query->the_post())
              @include('components.post-card')
            @endwhile
          </div>
        @endif
        <?php
          wp_reset_query();
        ?>
      @else
      @include('components.pagination', ['variant' => 'information'])
      @endif
      @while(have_posts()) @php(the_post())
        @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
      @endwhile
      @include('components.pagination')
    </main>
    <aside class="flex-shrink-0 lg:w-72 xl:w-96 p-2" aria-label="{{ __('Sidebar', 'tb') }}">
      @include('components.search-filters')
    </aside>
  </div>
@endsection
