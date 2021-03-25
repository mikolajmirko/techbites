@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (! have_posts())
    <p class="text-center">
      {{{ __('Sorry, no results were found.', 'tb') }}}
    <p>
  @endif

  <?php global $sublanguage; ?>
  @while(have_posts()) @php(the_post())
    @unless ($sublanguage->is_sub() && empty($sublanguage->get_post_field_translation(get_post(), 'post_title', $sublanguage->current_language)))
      @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
    @endunless
  @endwhile
@endsection
