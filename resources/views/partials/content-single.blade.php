@unless ($is_translated)
  <article @php(post_class())>
    <header>
      <h1 class="entry-title text-center text-xl font-bold text-black">
        {{ $title }}
      </h1>
      @include('partials/entry-meta')
    </header>
    <div class="entry-content text-center">
      @php(the_content())
      <pre class="text-left text-xs text-gray-500">@php(print_r(get_post()))</pre>
    </div>
  </article>
@endunless
