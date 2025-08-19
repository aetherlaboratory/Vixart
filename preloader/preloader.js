jQuery(document).ready(function() {
  var assetsLoaded = 0;
  var totalAssets = jQuery('body').find('*:visible').length;
  var increment = Math.ceil(totalAssets / 100);
  var progress = 0;
  var intervalId = setInterval(function() {
    assetsLoaded += increment;
    var newProgress = Math.round(assetsLoaded / totalAssets * 100);
    if (newProgress <= 100) {
      progress = newProgress;
      jQuery('.preloader-bar').stop().animate({width: progress + '%'}, 500, 'linear');
      jQuery('.preloader-text').text('Loading: ' + progress + '%');
    }
    if (progress >= 99 && !jQuery('.wp-admin-bar').is(':visible')) {
      progress = 100;
      jQuery('.preloader-bar').stop().animate({width: progress + '%'}, 500, 'linear');
      jQuery('.preloader-text').text('Loading: ' + progress + '%');
    }
    if (progress >= 100) {
      clearInterval(intervalId);
      jQuery('.preloader-container').fadeOut();
    }
  }, 5);
});
