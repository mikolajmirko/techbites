@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (! have_posts())
    <p class="text-center">
      {{{ _e('Sorry, but the page you are trying to view does not exist.', 'tb') }}}
    <p>
  @endif
@endsection
