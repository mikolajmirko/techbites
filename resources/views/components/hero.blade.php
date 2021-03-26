@if (isset($title))
  <div class="max-w-7xl mx-auto px-4 sm:px-6 pb-8 md:pb-4 pt-24 @if (isset($graphic)) lg:pt-12 @endif">
    <div class="container mx-auto flex flex-wrap flex-col md:flex-row items-center justify-between lg:px-4 mt-0 md:my-2 lg:-mb-40">
      <div role="region" aria-label="{{{ __('Page hero', 'tb') }}}" class="flex flex-col w-full lg:w-1/2 xl:w-2/5 justify-center items-start text-center md:text-left lg:pr-12 xl:pr-0 lg:mb-16">
        <h1 class="my-4 text-3xl xl:text-4xl font-bold leading-tight w-full text-white">{!! $title !!}</h1>
        @isset($description)
          <p class="leading-normal text-medium mb-4 text-white xl:text-lg">{{ $description }}</p>
        @endisset
        {{ $slot }}
      </div>
      @isset($graphic)
        <div class="hidden lg:flex lg:flex-grow lg:w-1/2 xl:w-3/5 justify-center text-white">
          @include('graphic::' . $graphic . '-hero', ['classes' => 'relative lg:w-full max-w-xl select-none pointer-events-none'])
        </div>
      @endisset
    </div>
  </div>
@else
  <div class="pt-24"></div>
@endif
