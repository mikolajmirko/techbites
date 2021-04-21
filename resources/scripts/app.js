/**
 * External Dependencies
 */
import 'jquery';
import 'alpinejs';
import 'sharer.js';

/**
 * Check before page load if high contrast mode is set
 */
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
      goUpButton.removeClass("-bottom-12").attr('aria-hidden', 'false');
      goUpButton.find('button').attr('tabindex', '0');
    } else {
      stickyHeader.removeClass("scrolledHeader");
      goUpButton.addClass("-bottom-12").attr('aria-hidden', 'true');
      goUpButton.find('button').attr('tabindex', '-1');
    }
  });

  if($(window).scrollTop() > 0) {
    stickyHeader.addClass("scrolledHeader");
    goUpButton.removeClass("-bottom-12").attr('aria-hidden', 'false');
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

  $('#searchField-with-popup').on('keyup', function() {
    $.post(ajaxurl,
      {
        action: 'data_search_fetch',
        language: languageCode,
        keyword: $('#searchField-with-popup').val()
      },
      function(data) {
        $('#dynamicSearchFetch').html(data);
      }
    );
  });

  /**
   * Search filter scripts
   */
  $('.search_category_section input').on('change', function() {
    let selected = [];
    $('.search_category_section input:checked').each(function() {
      selected.push($(this).val());
    });
    $('input[name="category_name"]').val(selected.join(','));
    $('.search_category_section input').parent().children('div').removeClass('w-4');
    $('.search_category_section input:checked').parent().children('div').addClass('w-4');
  });
  $('.search_category_section input:checked').parent().children('div').addClass('w-4');

  $('.search_tag_section input').on('change', function() {
    let selected = [];
    $('.search_tag_section input:checked').each(function() {
      selected.push($(this).val());
    });
    $('input[name="tag"]').val(selected.join(','));
    $(this).parent().toggleClass('checkedLabel');
  });
  $('.search_tag_section input:checked').parent().toggleClass('checkedLabel');

});
