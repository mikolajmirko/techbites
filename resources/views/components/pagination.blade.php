<?php
  global $wp_query;
  $max = intval($wp_query->max_num_pages);
  $paged = get_query_var('paged') ? absint(get_query_var('paged')) : 1;

  $fromResult = (($wp_query->current_post) * $wp_query->post_count) + 1;
  $toResult = 0;

  $pagenum = $wp_query->query_vars['paged'] < 1 ? 1 : $wp_query->query_vars['paged'];
  $first = ( ( $pagenum - 1 ) * $wp_query->query_vars['posts_per_page'] ) + 1;
  $last = $first + $wp_query->post_count - 1;
?>
@if (isset($variant) && $variant == 'information')
  <div class="w-full text-gray-700 dark:text-dark text-sm py-3 mb-2">
    {{ __('Showing', 'tb') }} @if($max > 1) <strong class="font-semibold">{{ $first }}</strong> - <strong class="font-semibold">{{ $last }}</strong> {{ __('of') }} @endif<strong class="font-semibold">{{ $wp_query->found_posts }}</strong> {{ _n('result', 'results', $wp_query->found_posts, 'tb') }}
  </div>
@else
  <div class="py-4">
    <?php

      if($wp_query->max_num_pages > 1) {
        $activeClass = ' bg-primary text-white font-semibold hover:bg-blue-600 dark:bg-dark';
        $normalClass = ' bg-white text-dark font-medium hover:bg-gray-50';
        $srSpan = '<span class="sr-only">' . __('Page', 'tb') . '</span>';

        if ($paged >= 1)
          $links[] = $paged;

        if ($paged >= 3) {
          $links[] = $paged - 1;
          $links[] = $paged - 2;
        }

        if (($paged + 2) <= $max) {
          $links[] = $paged + 2;
          $links[] = $paged + 1;
        }

      ?>
      <nav class="relative z-0 inline-flex space-x-1 w-full justify-center" aria-label="Pagination">
        @if(get_previous_posts_link())
          <a href="{!! previous_posts() !!}" class="relative inline-flex items-center p-2 pr-4 rounded-md shadow-md border border-gray-300 bg-white text-sm text-dark hover:bg-gray-50">
            @include('icon::chevron', ['classes' => 'mr-2 h-5 w-5 transform rotate-90', 'attributes' => ''])
            <span class="hidden sm:inline">{{ __('Previous') }}</span>
          </a>
        @endif
      <?php

        if (!in_array(1, $links)) {
          $class = 1 == $paged ? $activeClass : $normalClass;
          printf('<a class="relative inline-flex items-center px-3 py-2 rounded-md shadow-md border border-gray-300 text-sm%s" href="%s">%s%s</a>', $class, esc_url(get_pagenum_link(1)), $srSpan, '1');

          if (!in_array(2, $links))
            echo '<a class="relative inline-flex items-center px-4 py-2 rounded-md text-sm font-medium text-dark">…</a>';
        }

        sort($links);
        foreach ((array) $links as $link) {
          $class = $paged == $link ? $activeClass : $normalClass;
          printf('<a class="relative inline-flex items-center px-3 py-2 rounded-md shadow-md border border-gray-300 text-sm%s" href="%s">%s%s</a>', $class, esc_url(get_pagenum_link($link)), $srSpan, $link);
        }

        if (!in_array($max, $links)) {
          if (!in_array($max - 1, $links))
            echo '<a class="relative inline-flex items-center px-4 py-2 rounded-md text-sm font-medium text-dark">…</a>';

          $class = $paged == $max ? $activeClass : $normalClass;
          printf('<a class="relative inline-flex items-center px-3 py-2 rounded-md shadow-md border border-gray-300 text-sm%s" href="%s">%s%s</a>', $class, esc_url(get_pagenum_link($max)), $srSpan, $max);
        }

      ?>
        @if(get_next_posts_link())
          <a href="<?php next_posts(); ?>" class="relative inline-flex items-center p-2 pl-4 rounded-md shadow-md border border-gray-300 bg-white text-sm text-dark hover:bg-gray-50">
            <span class="hidden sm:inline">{{ __('Next') }}</span>
            @include('icon::chevron', ['classes' => 'ml-2 h-5 w-5 transform -rotate-90', 'attributes' => ''])
          </a>
        @endif
      </nav>
    <?php

      }

    ?>
  </div>
@endif
