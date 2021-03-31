<div x-data="{ filtersOpen: window.outerWidth > 1024 }" x-on:resize.window="filtersOpen = window.outerWidth > 1024">
  <div class="text-right lg:hidden">
    <button x-on:click="filtersOpen = !filtersOpen" type="button" class="mt-2 px-5 shadow-md rounded-md h-12 inline-flex items-center justify-center bg-dark text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-light focus:ring-dark hover:bg-gray-800" x-bind:aria-expanded="filtersOpen ? 'true' : 'false'" aria-haspopup="true">
      {{ __('Search and filters', 'tb') }}
      @include('icon::chevron', ['classes' => '-mr-1 ml-2 h-5 w-5 transform transition', 'attributes' => 'x-bind:class={"rotate-180":filtersOpen}'])
    </button>
  </div>
  <div
    x-show="filtersOpen"
    x-transition:enter="transition ease-out duration-100"
    x-transition:enter-start="opacity-0 scale-90"
    x-transition:enter-end="opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-100"
    x-transition:leave-start="opacity-100 scale-100"
    x-transition:leave-end="opacity-0 scale-90"
    class="origin-top-right mt-2 transform z-10 right-0 p-6 bg-dark rounded-md relative"
  >
    <form autocomplete="off" action="{{ get_permalink($catalog_page_id) }}" role="search" method="get" aria-lable="{{ __('Searching', 'tb') }}">
      <label for="searchField-filters" class="pb-2 text-sm sr-only">
        {{{ __('Search for bites', 'tb') }}}
      </label>
      <div class="search-form">
        <input id="searchField-filters" x-ref="searchField" type="search" name="s" placeholder="{{{ __('Search...', 'tb') }}}" value="{{{ get_search_query() }}}" class="flex-grow w-full mb-6 focus:outline-none shadow-md border-2 border-gray-300 dark:border-gray-500 focus:border-primary dark:focus:border-accent focus:ring-0 rounded-md h-12 px-4 dark:placeholder-black" autocomplete="false">
        <div class="search_category_section mb-6">
          <h4 class="text-sm text-gray-200 uppercase tracking-wider my-2 focus:outline-none focus:underline" tabindex="0">{{ __('Process phase', 'tb') }}</h4>
          @foreach (wp_get_nav_menu_items($category_menu_id) as $menu_item)
            <?php
              $category = get_term($menu_item->object_id);
              $is_selected = isset($_GET['category_name']) ? in_array($category->slug, explode(',', $_GET['category_name'])) : false;
            ?>
            <label for="cat-{{ $category->slug }}" class="group cursor-pointer rounded-md mx-auto my-0 flex items-center justify-between py-2 pr-2 select-none">
              <div class="h-8 w-2 group-hover:w-4 rounded-r-md mr-4 -ml-6 flex-shrink-0" style="background-color: {{ $category_colors[$category->slug] }}"></div>
              @include('icon::process.' . $category->slug, ['classes' => 'flex-shrink-0 h-7 w-7 text-white mr-4 transform transition group-hover:translate-x-2'])
              <span class="text-white text-sm flex-grow font-bold tracking-wide">{{ $category->name }}</span>
              <input id="cat-{{ $category->slug }}" type="checkbox" value="{{ $category->slug }}" class="ml-12 h-5 w-5 rounded-md border-2 border-gray-300 bg-light text-primary dark:text-accent focus:outline-none focus:ring-2 focus:ring-offset-dark focus:ring-offset-2 focus:ring-white dark:focus:ring-accent flex-shrink-0" <?= ($is_selected) ? 'checked' : '' ?>>
            </label>
          @endforeach
        </div>
        <input type="hidden" name="category_name" value="<?php echo $_GET['category_name'] ?? ''; ?>" />
        <div class="search_tag_section mb-6">
          <h4 class="text-sm text-gray-200 uppercase tracking-wider my-2 focus:outline-none focus:underline" tabindex="0">{{ __('Bite tags', 'tb') }}</h4>
          <div class="flex flex-wrap">
            <?php
              $posttags = get_tags(array('hide_empty' => true, 'orderby' => 'count', 'order' => 'DESC', 'number' => 8));
              if ($posttags) {
                foreach($posttags as $tag) {
                  $is_selected = isset($_GET['tag']) ? in_array($tag->slug, explode(',', $_GET['tag'])) : false;
                  ?>
                    <label for="tag-{{ $tag->slug }}" class="cursor-pointer rounded-xl text-sm relative bg-white text-dark hover:bg-gray-200 py-1 px-2 pr-4 mt-2 mr-2 flex items-center select-none focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-dark focus-within:ring-offset-2 focus-within:ring-white dark:focus-within:ring-accent" tabindex="-1">
                      <input type="checkbox" id="tag-{{ $tag->slug }}" value="{{ $tag->slug }}" class="opacity-0 absolute" <?= ($is_selected) ? 'checked' : '' ?>>
                      @include('icon::hash', ['classes' => 'mr-2 h-4 w-4 flex-shrink-0'])
                      <span class="">{{ $tag->name }}</span>
                    </label>
                  <?php
                }
              } else {
                echo "<span class='text-white text-sm p-4'>", __('No tags available', 'tb') ,"</span>";
              }
            ?>
          </div>
        </div>
        <input type="hidden" name="tag" value="<?php echo $_GET['tag'] ?? ''; ?>" />
        <div class="search_sort_section mb-6">
          <div class="grid gap-2 grid-cols-1 sm:grid-cols-2 lg:grid-cols-1 xl:grid-cols-2">
            <?php
              $selectedOrderBy = $_GET['orderby'] ?? 'date';
              $secletedOrder = $_GET['order'] ?? 'DESC';
            ?>
            <div>
              <h4 class="text-sm text-gray-200 uppercase tracking-wider my-2 focus:outline-none focus:underline" tabindex="0">{{ __('Sort by', 'tb') }}</h4>
              <select class="block appearance-none focus:outline-none shadow-md border-2 border-gray-300 dark:border-gray-500 focus:border-primary dark:focus:border-accent focus:ring-0 rounded-md text-black py-3 px-4 pr-8 w-full" name="orderby" value="<?php echo $selectedOrderBy; ?>">
                <option value="date" <?= ($selectedOrderBy == 'date') ? 'selected' : '' ?>>{{ __('Post date', 'tb') }}</option>
                <option value="title" <?= ($selectedOrderBy == 'title') ? 'selected' : '' ?>>{{ __('Title', 'tb') }}</option>
              </select>
            </div>
            <div>
              <h4 class="text-sm text-gray-200 uppercase tracking-wider my-2 focus:outline-none focus:underline" tabindex="0">{{ __('Sort order', 'tb') }}</h4>
              <select class="block appearance-none focus:outline-none shadow-md border-2 border-gray-300 dark:border-gray-500 focus:border-primary dark:focus:border-accent focus:ring-0 rounded-md text-black py-3 px-4 pr-8 w-full" name="order" value="<?php echo $secletedOrder; ?>">
                <option value="DESC" <?= ($secletedOrder == 'DESC') ? 'selected' : '' ?>>{{ __('Descending', 'tb') }}</option>
                <option value="ASC" <?= ($secletedOrder == 'ASC') ? 'selected' : '' ?>>{{ __('Ascending', 'tb') }}</option>
              </select>
            </div>
          </div>
        </div>
      </div>
      <button type="submit" class="flex w-full h-12 justify-center items-center shadow-md rounded-md text-white bg-primary dark:bg-accent hover:dark dark:hover:bg-accent focus:outline-none focus:ring-2 focus:ring-offset-dark focus:ring-offset-2 focus:ring-white dark:focus:ring-accent" aria-label="{{{ __('Search...', 'tb') }}}">
        @include('icon::search', ['classes' => 'h-6 w-6 mr-2']) {{ __('Search') }}
      </button>
    </form>
  </div>
</div>
