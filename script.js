$(document).ready(function() {
   


  // Toggle Search Form On Search Btn Click
  $('#search-btn').click(function() {
    $('.search-form').toggleClass('d-none');
    $(this).toggleClass('active');

  });

  // Add click listener to close-btn using on()
  $(document).on('click', '.close-search-btn', function() {
    $('.search-form').addClass('d-none');
    allowScrolling();  // Allow scrolling when menu is closed
    $('#close-search-btn').removeClass('d-none'); // Ensure #menu-btn is visible when menu is closed
  });




});




