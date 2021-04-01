@extends('layouts.app')

@section('content')
  <div class="flex flex-col-reverse lg:flex-row">
    <main class="flex-grow px-3" aria-label="{{{ __('Website main content', 'tb') }}}">
      @include('components.pagination', ['variant' => 'information'])
      @if (!have_posts())
        <p class="text-center">
          {{{ __('Sorry, no results were found.', 'tb') }}}
        <p>
      @endif
      <?php global $sublanguage; ?>
      @while(have_posts()) @php(the_post())
        {{-- @unless ($sublanguage->is_sub() && empty($sublanguage->get_post_field_translation(get_post(), 'post_title', $sublanguage->current_language))) --}}
          @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
        {{-- @endunless --}}
      @endwhile
      @include('components.pagination')
    </main>
    <aside class="flex-shrink-0 lg:w-72 xl:w-96 p-2" aria-label="{{ __('Sidebar', 'tb') }}">
      @include('components.search-filters')
    </aside>
  </div>
@endsection
