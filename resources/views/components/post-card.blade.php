<a href="{{ get_permalink() }}" alt="{{ $title }}" title="{{ $title }}" class="bite-card w-full max-w-lg mb-4 block mx-auto rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 dark:focus:ring-accent">
  <article class="w-full h-full flex flex-col justify-between rounded-md transition">
    <div>
      <div class="post-thumbnail h-56 rounded-md overflow-hidden">
        @if (get_the_post_thumbnail_url())
          <?php
            $thumbnail_id = get_post_thumbnail_id();
            $thumbnail = get_post($thumbnail_id);
            $thumbnail_alt = get_post_meta($thumbnail_id, '_wp_attachment_image_alt', true);

            if(!empty($thumbnail_alt)) {
              $thumbnail_title = $thumbnail_alt;
            } elseif(!empty($thumbnail->post_title)) {
              $thumbnail_title = $thumbnail->post_title;
            } elseif(!empty($thumbnail->post_excerpt)) {
              $thumbnail_title = $thumbnail->post_excerpt;
            } elseif(!empty($thumbnail->post_content)) {
              $thumbnail_title = $thumbnail->post_content;
            } else {
              $thumbnail_title = __('Bite thumbnail', 'tb');
            }
          ?>
          <div class="w-full h-full bg-gray-500 bg-cover bg-center" style="background-image: url('{{ get_the_post_thumbnail_url() }}')" title="{{ $thumbnail_title }}"></div>
        @else
          <div class="w-full h-full bg-gray-600 text-gray-300 flex justify-center align-middle">@include('icon::image', ['classes' => 'w-28'])</div>
        @endif
      </div>
      <h2 class="text-dark font-semibold text-xl py-1 px-2 mt-1 pb-3">{{ $title }}</h2>
    </div>
    <div class="post-meta flex flex-row py-1 flex-wrap">
      <span class="text-xs relative text-gray-600 dark:text-dark py-1 px-2 mr-2 flex items-center" title="{{ __('Author', 'tb') }}">
        @include('icon::user', ['classes' => 'mr-2 h-4 w-4 flex-shrink-0'])
        {{ get_the_author() }}
      </span>
      <time datetime="{{ get_post_time('c', true) }}" class="text-xs relative text-gray-600 dark:text-dark py-1 px-2 mr-3 flex items-center" title="{{ __('Date', 'tb') }}">
        @include('icon::date', ['classes' => 'mr-2 h-4 w-4 flex-shrink-0'])
        {{ get_the_date() }}
      </time>
      <span class="text-xs relative text-gray-600 dark:text-black py-1 px-2 mr-0 flex items-center" title="{{ __('Read time', 'tb') }}">
        @include('icon::clock', ['classes' => 'mr-2 h-4 w-4 flex-shrink-0'])
        {{ $read_time }}
      </span>
    </div>
  </article>
</a>
