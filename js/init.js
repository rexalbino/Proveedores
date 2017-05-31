(function($){
  $(function(){
      var window_width = $(window).width();
     $('.datepicker').pickadate({selectYears: 20});
    $('.button-collapse').sideNav();
    $('.parallax').parallax();
      $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15 // Creates a dropdown of 15 years to control year
  });
  }); // end of document ready
    $(document).ready(function(){
    // the "href" attribute of .modal-trigger must specify the modal ID that wants to be triggered
    $('.modal-trigger').leanModal();
  });
    
})(jQuery); // end of jQuery name space
 