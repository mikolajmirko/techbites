@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (! have_posts())
    <p class="text-center">
      {{{ __('Sorry, no results were found.', 'tb') }}}
    <p>
  @endif

  @while(have_posts()) @php(the_post())
    @include('partials.content-search')
  @endwhile

@endsection
