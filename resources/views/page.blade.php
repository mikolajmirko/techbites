@extends('layouts.app')

@section('content')
  @while(have_posts()) @php(the_post())
    <main aria-label="{{{ __('Website main content', 'tb') }}}">
      @includeFirst(['partials.content-page', 'partials.content'])
    </main>
  @endwhile
@endsection
