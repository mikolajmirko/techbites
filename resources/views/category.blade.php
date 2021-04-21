@extends('layouts.app')

@section('content')
  <div class="flex flex-col lg:flex-row">
    <main class="flex-grow px-3" aria-label="{{{ __('Website main content', 'tb') }}}">
      @include('components.pagination', ['variant' => 'information'])
      @if (!have_posts())
        <p class="text-center">
          {{{ __('Sorry, no results were found.', 'tb') }}}
        <p>
      @endif
      @while(have_posts()) @php(the_post())
        @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
      @endwhile
      @include('components.pagination')
    </main>
    <aside class="flex-shrink-0 lg:w-72 xl:w-96 p-2 lg:pl-4 mb-6" aria-label="{{ __('Sidebar', 'tb') }}">
      <?php
        $category = get_queried_object();
        $args = array(
          'posts_per_page' => 3,
          'post__in' => get_option('sticky_posts'),
          'category__in' => $category->term_id,
          'ignore_sticky_posts' => 1
        );
        $query = new WP_Query($args);
      ?>
      @if($query->have_posts())
        <div class="w-full text-gray-700 dark:text-dark text-left lg:text-right text-sm py-3 mb-2">
          {{ __('Highlighted bites', 'tb') }}
        </div>
        <div class="flex flex-row lg:flex-column flex-wrap">
          @while($query->have_posts()) @php($query->the_post())
            @include('components.post-card')
            <div class="w-6"></div>
          @endwhile
        </div>
      @endif
      <?php
        wp_reset_query();
      ?>
      <div class="w-full text-gray-700 dark:text-dark text-left lg:text-right text-sm py-3 mb-2">
        {{ __('Bite tags', 'tb') }}
      </div>
      <div class="flex flex-row lg:flex-row-reverse flex-wrap">
        <?php
          $posttags = get_tags(array('hide_empty' => true, 'orderby' => 'count', 'order' => 'DESC', 'number' => 10));
          if ($posttags) {
            foreach($posttags as $tag) {
              $is_selected = isset($_GET['tag']) ? in_array($tag->slug, explode(',', $_GET['tag'])) : false;
              ?>
                <a href="{{ get_permalink($catalog_page_id) }}?tag={{ $tag->slug }}" class="cursor-pointer rounded-xl text-sm relative text-dark dark:text-black bg-gray-200 py-1 px-2 pr-4 mb-2 ml-2 flex items-center select-none focus:outline-none focus:ring-2 focus:ring-offset-light focus:ring-offset-2 focus:ring-primary dark:focus:ring-accent">
                  @include('icon::hash', ['classes' => 'mr-2 h-4 w-4 flex-shrink-0'])
                  <span>{{ $tag->name }}</span>
                </a>
              <?php
            }
          } else {
            echo "<span class='text-dark text-sm p-4'>", __('No tags available', 'tb') ,"</span>";
          }
        ?>
      </div>
    </aside>
  </div>
@endsection
