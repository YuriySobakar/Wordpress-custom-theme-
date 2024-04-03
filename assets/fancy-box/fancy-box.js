jQuery(document).ready(function($) {
  $('.fancy-gallery-image-link').click(function() {
    Fancybox.bind('[data-fancybox="gallery"]', {
      hideScrollbar: false,
      groupAll: true,
      animated: true,
    });
  });
});

