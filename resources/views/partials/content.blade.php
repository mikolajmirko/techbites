<article @php(post_class())>
  <header>
    <h1 class="entry-title text-center text-xl font-bold text-black">
      <a href="{{ get_permalink() }}">
        {{ $title }}
      </a>
    </h1>
    @include('partials/entry-meta')
  </header>
  <div class="entry-summary text-center mb-4">
    @php(the_content())
  </div>
</article>
