<div class="page-header mb-4">
  <h1>{!! $title !!}</h1>
  @if (get_the_archive_description())
    <h4 class="text-center">{!! get_the_archive_description() !!}</h4>
  @endif
</div>
