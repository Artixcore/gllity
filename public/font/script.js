// use layoutit.com to build the template
// then add the following JS lines
$('.dropdown-toggle').hover(
  function() {
    $('.dropdown-menu', this).stop().slideDown(200);
  },
  function() {
    $('.dropdown-menu', this).stop().slideUp(200);
  }
);
