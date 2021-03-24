<?php
  global $sublanguage;
?>

@if ($variant == 'dropdown')
  <div class="relative ml-2" x-data="{ languageOpen: false }">
    <div>
      <button x-on:click="languageOpen = true" type="button" class="shadow-md rounded-md h-10 px-4 inline-flex items-center justify-center bg-white text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-blue-600 dark:focus:ring-offset-dark focus:ring-white hover:bg-gray-100" id="options-menu"  x-bind:aria-expanded="languageOpen ? 'true' : 'false'" aria-haspopup="true">
        <span class="sr-only">{{{ __('Site language', 'tb') }}}</span>
        @include('icon::flags.' . $sublanguage->current_language->post_name,  ['classes' => 'w-5 mr-3 border border-gray-300'])
        {{{ $sublanguage->current_language->post_title }}}
        @include('icon::chevron', ['classes' => '-mr-1 ml-2 h-5 w-5 transform transition', 'attributes' => 'x-bind:class={"rotate-180":languageOpen}'])
      </button>
    </div>
    <div
      x-show="languageOpen"
      @click.away="languageOpen = false"
      x-transition:enter="transition ease-out duration-100"
      x-transition:enter-start="opacity-0 scale-90"
      x-transition:enter-end="opacity-100 scale-100"
      x-transition:leave="transition ease-in duration-100"
      x-transition:leave-start="opacity-100 scale-100"
      x-transition:leave-end="opacity-0 scale-90"
      class="origin-top-right absolute z-10 mt-2 transform w-40 right-0"
      role="menu"
    >
      <div class="rounded-lg shadow-lg ring-1 ring-black ring-opacity-5 overflow-hidden bg-white p-4 text-center">
        @foreach ($sublanguage->get_languages() as $language)
          <a href="{{{ $sublanguage->get_translation_link($language) }}}" class="mb-2 last:mb-0 flex items-center text-sm text-gray-700 hover:bg-gray-50 rounded-sm hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-primary dark:focus:ring-accent py-2 px-3 @if ($sublanguage->current_language->post_name == $language->post_name) font-bold @endif" role="menuitem">
            @include('icon::flags.' . $language->post_name,  ['classes' => 'w-5 mr-3 border border-gray-300'])
            {{{ $language->post_title }}}
          </a>
        @endforeach
      </div>
    </div>
  </div>
@else
  @foreach ($sublanguage->get_languages() as $language)
    <?php $isCurrent = $sublanguage->current_language->post_name == $language->post_name; ?>
    <a href="{{{ $sublanguage->get_translation_link($language) }}}" class="inline-flex items-center text-gray-700 hover:bg-gray-50 rounded-sm hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-primary dark:focus:ring-accent py-2 px-3 @if ($isCurrent) font-bold @endif" role="menuitem" aria-current="@if ($isCurrent) true @else false @endif">
      @include('icon::flags.' . $language->post_name,  ['classes' => 'w-5 mr-3 border border-gray-300'])
      {{{ $language->post_title }}}
    </a>
  @endforeach
@endif
