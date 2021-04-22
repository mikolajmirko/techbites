<?php
  $cat = $categories[$category];
  $justtext = $justtext ?? false;
?>
<div id="{{ $category }}_info_card" class="diagram-info-card">
  @if($justtext)
  <div class="block mb-4 p-2">
  @else
  <a
    href="{{ get_category_link($cat) }}"
    title="{{ $cat->name }}"
    class="block mb-8 focus:outline-none focus:ring-2 focus:ring-primary dark:focus:ring-accent focus:ring-offset-2 focus:ring-offset-light rounded-md p-2
    @if($category == 'design') lg:-mr-8 lg:ml-8 @endif @if($category == 'vision') lg:mr-8 lg:-ml-8 @endif"
  >
  @endif
    <h2 class="text-dark font-semibold text-xl lg:text-2xl mb-1">{{ $cat->name }}</h2>
    <div class="w-full h-1 rounded-md" style="background-color: {{ $category_colors[$category] }}"></div>
    <p class="mt-2 text-sm text-gray-600 dark:text-gray-900">{{ $cat->description }}</p>
  @if($justtext)
  </div>
  @else
  </a>
  @endif
</div>
