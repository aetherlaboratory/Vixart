function removeTrailingSlash(url) {
  return url.replace(/\/$/, '');
}

$(document).ready(function() {
  // Restricts body scroll limit to height of mobile menu if less than 768px
  function restrictScrolling() {
    if ($(window).width() < 768) {
      var menuHeight = $('#mobile-menu').outerHeight();
      $('body').css({
        'max-height': menuHeight + 'px',
        'overflow': 'hidden'
      });
    }
  }

  // Resets scroll limits if over 768px
  function allowScrolling() {
    if ($(window).width() < 768) {
      $('body').css({
        'max-height': '',
        'overflow': ''
      });
    }
  }

  // Toggle footer class on menu toggle click
  $('#menu-btn').click(function() {
    $('.main-menu').toggleClass('d-none');
    $(this).toggleClass('active');

    // If mobile menu is now visible, restrict scrolling
    if (!$('.main-menu').hasClass('d-none')) {
      restrictScrolling();
    } else {
      allowScrolling();
    }

    // Show or hide #menu-btn based on main-menu's d-none class
    if ($('.main-menu').hasClass('d-none')) {
      $('#menu-btn').removeClass('d-none');
    } else {
      $('#menu-btn').addClass('d-none');
    }
  });

  // Add click listener to close-btn using on()
  $(document).on('click', '.close-btn', function() {
    $('.main-menu').addClass('d-none');
    allowScrolling();  // Allow scrolling when menu is closed
    $('#menu-btn').removeClass('d-none'); // Ensure #menu-btn is visible when menu is closed
  });

  var currentUrl = removeTrailingSlash(window.location.href);

  $('.nav-link').each(function() {
    var menuItemUrl = removeTrailingSlash($(this).attr('href'));

    if (currentUrl === menuItemUrl) {
      $(this).addClass('active text-light').attr('aria-current', 'page');
    }
  });
});
