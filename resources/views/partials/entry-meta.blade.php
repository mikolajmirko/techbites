<p class="byline author text-center text-sm text-gray-700 mb-2">
  <time class="updated text-gray-600" datetime="{{ get_post_time('c', true) }}">
    {{ get_the_date() }} |
  </time>
  <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" rel="author">
    {{ get_the_author() }}
  </a>
</p>
