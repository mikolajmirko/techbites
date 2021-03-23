<form role="search" method="get" class="search-form" action="{{ home_url('/') }}">
  <label>
    <span class="sr-only">
      {{ _x('Search for:', 'label', 'tb') }}
    </span>
    <input
      type="search"
      placeholder="{!! esc_attr_x('Search &hellip;', 'placeholder', 'tb') !!}"
      value="{{ get_search_query() }}"
      name="s"
    >
  </label>
  <input
    type="submit"
    value="{{ esc_attr_x('Search', 'submit button', 'tb') }}"
  >
</form>
