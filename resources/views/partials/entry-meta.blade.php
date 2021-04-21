<p class="text-center text-sm md:text-base text-gray-600 dark:text-dark mb-8 space-x-2">
  <span title="{{ __('Author') }}">{{ get_the_author() }}</span>
  <span>|</span>
  <time title="{{ __('Date') }}" datetime="{{ get_post_time('c', true) }}">{{ get_the_date() }}</time>
  <span>|</span>
  <span title="{{ __('Read time', 'tb') }}">{{ $read_time }}</span>
</p>
