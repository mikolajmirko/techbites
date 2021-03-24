/**
 * External Dependencies
 */
import 'jquery';
import 'alpinejs';

var mainDocument = $("body");
if (('theme' in localStorage) && localStorage.theme === 'dark') {
  mainDocument.addClass("dark");
}

$(function() {
  /**
   * Header always on top with applied efect on scroll
   */
  var stickyHeader = $("#stickyHeader");
  var goUpButton = $("#goUpButton");
  $(window).on('scroll', function() {
    const scroll = $(window).scrollTop();
    if (scroll >= 50) {
      stickyHeader.addClass("scrolledHeader");
      goUpButton.removeClass("-bottom-12 no-sr-only").attr('aria-hidden', 'false');
    } else {
      stickyHeader.removeClass("scrolledHeader");
      goUpButton.addClass("-bottom-12 no-sr-only").attr('aria-hidden', 'true');
    }
  });

  if($(window).scrollTop() > 0) {
    stickyHeader.addClass("scrolledHeader");
  }

  /**
   * Animated scroll up to the top
   */
   goUpButton.find('button').on('click', function() {
    $("html, body").animate({ scrollTop: 0 });
    return false;
  });

  /**
   * Apply high contrast theme mode saved in local Storage
   */

  $('.highContrastModeToggle').on('click', function() {
    if (('theme' in localStorage) && localStorage.theme === 'dark') {
      localStorage.theme = 'classic';
      mainDocument.removeClass("dark");
    } else {
      localStorage.theme = 'dark';
      mainDocument.addClass("dark");
    }
  });

});
