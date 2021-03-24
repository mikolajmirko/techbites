<article @php(post_class())>
  <header>
    <h1 class="entry-title">
      {{ $title }}
    </h1>
    @include('partials/entry-meta')
  </header>
  <div class="entry-content">
    @php(the_content())
    <pre>@php(print_r(get_post()))</pre>
  </div>
</article>
