<article @php(post_class())>
  <header>
    <h2 class="entry-title text-center text-xl font-bold text-black">
      <a href="{{ get_permalink() }}">
        {{ $title }}
      </a>
    </h2>
    @includeWhen(get_post_type() === 'post', 'partials/entry-meta')
  </header>
  <div class="entry-summary text-center mb-4">
    @php(the_excerpt())
  </div>
</article>
