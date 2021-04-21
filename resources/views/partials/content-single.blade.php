{{-- @unless ($is_translated) --}}
<div class="max-w-5xl mx-auto mb-10">
  <article @php(post_class())>
    <header>
      <h1 class="text-3xl md:text-4xl text-dark text-center py-6 pb-4 px-8 font-semibold">
        {{ $title }}
      </h1>
      @include('partials/entry-meta')
    </header>
    <?php
      $categories = get_the_category();
    ?>
    @if ($categories)
      <div class="flex justify-center px-3 -mb-8">
        @foreach (wp_get_nav_menu_items($category_menu_id) as $menu_item)
          <?php
            $category = get_term($menu_item->object_id);
          ?>
          @if(in_array($category->slug, array_column($categories, 'slug')))
            <div title="{{ $category->name }}">
              @include('icon::process.hex.' . $category->slug, ['classes' => 'h-14 w-14 -mr-2 sm:h-16 sm:w-16 sm:-mr-2'])
            </div>
          @endif
        @endforeach
      </div>
    @endif
    <div class="bg-white rounded-xl shadow-xl w-full py-16 px-6 md:px-16 lg:px-24">
      @if(has_post_thumbnail())
        {!! the_post_thumbnail('post-thumbnail', ['class' => 'rounded-lg mb-6']) !!}
      @endif
      <div class="post-content">
        @php(the_content())
      </div>
      <div class="w-full inline-flex flex-wrap pt-12">
        <?php
          $posttags = get_the_tags();
        ?>
          @if($posttags)
            @foreach($posttags as $tag)
              <a href="{{ get_permalink($catalog_page_id) }}?tag={{ $tag->slug }}" class="rounded-xl text-sm text-dark bg-gray-200 py-1 px-2 pr-4 mr-2 mb-1 flex items-center select-none focus:outline-none focus:ring-2 focus:ring-offset-white focus:ring-offset-2 focus:ring-primary dark:focus:ring-accent">
                @include('icon::hash', ['classes' => 'mr-2 h-4 w-4 flex-shrink-0'])
                {{ $tag->name }}
              </a>
            @endforeach
          @endif
      </div>
      @include('components.social-share')
    </div>
  </article>
  <div>
    <?php related_posts() ?>
  </div>
</div>
{{-- @endunless --}}
