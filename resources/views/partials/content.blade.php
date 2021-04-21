<a href="{{ get_permalink() }}" alt="{{ $title }}" title="{{ $title }}" class="bite-card block rounded-md focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 dark:focus:ring-accent">
  <article class="w-full bg-white rounded-md shadow-md transition hover:shadow-lg mb-4">
    <div class="md:flex relative">
      @if($is_translated)
        <div class="bg-dark bg-opacity-25 w-full h-full absolute bottom-0 left-0 rounded-t-md"></div>
      @endif
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
        <div class="post-thumbnail h-48 md:h-auto md:w-56 flex-none rounded-t-md md:rounded-t-none md:rounded-tl-md overflow-hidden">
          <div class="w-full h-full bg-gray-500 bg-cover bg-center" style="background-image: url('{{ get_the_post_thumbnail_url() }}')" title="{{ $thumbnail_title }}"></div>
        </div>
      @endif
      <div class="p-4 pb-2 flex flex-col justify-between flex-grow leading-normal">
        <div class="mb-8">
          <h2 class="text-dark font-semibold text-2xl mb-2">{{ $title }}</h2>
          <p class="text-gray-700 text-sm text-justify">
            <?php
              $ex = esc_html(get_the_excerpt());
              $max_letters = 240;
              echo strlen($ex) > $max_letters ? substr($ex, 0, $max_letters)."..." : $ex;
            ?>
          </p>
        </div>
        <div class="inline-flex flex-wrap">
          <?php
            $posttags = get_the_tags();
          ?>
            @if($posttags)
              @foreach($posttags as $tag)
                <span class="rounded-xl text-xs text-dark bg-gray-200 py-1 px-2 pr-4 mr-2 mb-1 flex items-center">
                  @include('icon::hash', ['classes' => 'mr-2 h-3 w-3 flex-shrink-0'])
                  {{ $tag->name }}
                </span>
              @endforeach
            @endif
        </div>
      </div>
      <?php
        $categories = get_the_category();
      ?>
      @if ($categories)
        <div class="flex justify-start md:justify-center md:block px-3 md:p-3 md:pl-0 md:mb-6">
          @foreach (wp_get_nav_menu_items($category_menu_id) as $menu_item)
            <?php
              $category = get_term($menu_item->object_id);
            ?>
            @if(in_array($category->slug, array_column($categories, 'slug')))
              <span title="{{ $category->name }}">
                @include('icon::process.hex.' . $category->slug, ['classes' => 'h-14 w-14 mb-4 md:-mb-4 -mr-4 md:mr-0'])
              </span>
            @endif
          @endforeach
        </div>
      @endif
    </div>
    <div class="border-t border-gray-300 bg-gray-100 p-2 flex justify-between rounded-b-md">
      <div class="post-meta flex flex-col sm:flex-row">
        <span class="text-sm relative text-dark dark:text-black py-1 px-2 mr-3 flex items-center" title="{{ __('Author', 'tb') }}">
          @include('icon::user', ['classes' => 'mr-3 h-4 w-4 flex-shrink-0'])
          {{ get_the_author() }}
        </span>
        <time datetime="{{ get_post_time('c', true) }}" class="text-sm relative text-dark dark:text-black py-1 px-2 mr-3 flex items-center" title="{{ __('Date', 'tb') }}">
          @include('icon::date', ['classes' => 'mr-3 h-4 w-4 flex-shrink-0'])
          {{ get_the_date() }}
        </time>
        @if($is_translated)
          <span class="text-sm relative text-dark dark:text-black py-1 px-2 flex items-center">
            @include('icon::flags.pl', ['classes' => 'mr-3 h-4 w-5 flex-shrink-0 border border-gray-400'])
            {{ __('Available only in Polish', 'tb') }}
          </span>
        @endif
      </div>
      <span class="text-sm relative text-dark dark:text-black py-1 px-2 flex items-center">
        {{ __('Read more', 'tb') }}
        @include('icon::chevron', ['classes' => 'ml-2 h-4 w-4 flex-shrink-0 transform -rotate-90', 'attributes' => ''])
      </span>
    </div>
  </article>
</a>
