// external js:
// http://isotope.metafizzy.co/beta/isotope.pkgd.js

$(function() {

  var $container = $('.isotope').isotope({
    itemSelector: '.item',
    masonry: {
      columnWidth: 100
    }
  });

  $container.on( 'click', '.item', function() {
    // change size of item by toggling gigante class
    $( this ).toggleClass('gigante');
    $container.isotope('layout');
  });
  
});
$container.isotope( 'on', 'layoutComplete',
  function( isoInstance, laidOutItems ) {
    console.log( 'Isotope layout completed on ' +
      laidOutItems.length + ' items' );
  }
);