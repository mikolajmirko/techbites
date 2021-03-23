<footer>
  <nav class="nav-bottom">
    @if (has_nav_menu('bottom_navigation'))
      {!! wp_nav_menu(['theme_location' => 'bottom_navigation', 'menu_class' => 'nav', 'echo' => false]) !!}
    @endif
  </nav>
</footer>
