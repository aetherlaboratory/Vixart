jQuery(document).ready(function($) {
  // When a modal is about to show
  $('#videoModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var videoUrl = button.data('video-url'); // Extract info from data-* attributes
    var video = $(this).find('video').get(0);
    video.src = videoUrl; // Set the video URL dynamically
    video.load(); // If needed, load the video anew

    // Show preloader
    $('#videoPreloader').show();
  });

  // When a modal has fully shown
  $('#videoModal').on('shown.bs.modal', function() {
    var video = $(this).find('video').get(0);
    video.play(); // Play the video

    // Hide preloader once video can play through
    video.oncanplaythrough = function() {
      $('#videoPreloader').hide();
    };
  });

  // When a modal is about to hide
  $('#videoModal').on('hidden.bs.modal', function() {
    var video = $(this).find('video').get(0);
    video.pause(); // Pause the video
    video.src = ''; // Clear the video source

    // Hide the preloader
    $('#videoPreloader').hide();
  });

  // Custom close button functionality
  $('.btn-close-modal').on('click', function() {
    $('#videoModal').modal('hide');
  });

  // Handling the closing of the modal
  $('#videoModal').on('hide.bs.modal', function() {
    var video = $(this).find('video').get(0);
    video.pause(); // Pause the video
    video.currentTime = 0; // Reset the video
    $('#videoPreloader').hide(); // Ensure preloader is hidden
  });
});
