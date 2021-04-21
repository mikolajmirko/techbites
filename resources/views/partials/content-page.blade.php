{{-- @unless ($is_translated) --}}
<div class="mx-auto mt-6 mb-10">
  <article @php(post_class())>
    <div class="post-content">
      @php(the_content())
    </div>
  </article>
</div>
{{-- @endunless --}}
