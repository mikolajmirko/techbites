@extends('layouts.app')

@section('content')
  <main aria-label="{{{ __('Website main content', 'tb') }}}" class="pb-16">
    <h1 class="text-dark font-semibold text-3xl mb-1 mt-6 text-center">{{ __('It\'s great that you end up here actually...', 'tb') }}</h1>
    <p class="text-gray-600 dark:text-dark w-full text-center mb-10 text-sm px-4">{{ __('Read about what makes 404 pages good', 'tb') }}</p>
    <?php
      $post_404_name = get_option('tb_setting_404_post');
      $query_post_404 = new WP_Query( array(
        'posts_per_page' => 1,
        'name' => $post_404_name
       ));
    ?>
    @if($query_post_404->have_posts())
      @while($query_post_404->have_posts()) @php($query_post_404->the_post())
        @include('partials.content')
      @endwhile
    @endif
    <?php wp_reset_postdata(); ?>
  </main>
@endsection
