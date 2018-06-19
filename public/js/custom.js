$(document).ready(function(){
  $(".dropdown").on("hide.bs.dropdown", function(){
    $(".dropdown-toggle").removeClass('mohi-arrow');
  });
  $(".dropdown").on("show.bs.dropdown", function(){
    $(".dropdown-toggle").addClass('mohi-arrow');
  });
});


jQuery('<div class="quantity-nav"><div class="quantity-button quantity-up">+</div><div class="quantity-button quantity-down">-</div></div>').insertAfter('.quantity input');
jQuery('.quantity').each(function() {
  var spinner = jQuery(this),
    input = spinner.find('input[type="number"]'),
    btnUp = spinner.find('.quantity-up'),
    btnDown = spinner.find('.quantity-down'),
    min = input.attr('min'),
    max = input.attr('max');

  btnUp.click(function() {
    var oldValue = parseFloat(input.val());
    if (oldValue >= max) {
      var newVal = oldValue;
    } else {
      var newVal = oldValue + 1;
    }
    spinner.find("input").val(newVal);
    spinner.find("input").trigger("change");
  });

  btnDown.click(function() {
    var oldValue = parseFloat(input.val());
    if (oldValue <= min) {
      var newVal = oldValue;
    } else {
      var newVal = oldValue - 1;
    }
    spinner.find("input").val(newVal);
    spinner.find("input").trigger("change");
  });

});





document.querySelector("html").classList.add('js');

var fileInput  = document.querySelector( ".input-file" ),
    button     = document.querySelector( ".input-file-trigger" ),
    the_return = document.querySelector(".file-return");

    if (typeof(fileInput) != 'undefined' && fileInput != null)
    {
      console.log("second");
      fileInput.addEventListener( "change", function( event ) {
          the_return.innerHTML = this.value;
      });
    }

    if (typeof(button) != 'undefined' && button != null)
    {
      console.log("second");
      button.addEventListener( "keydown", function( event ) {
          if ( event.keyCode == 13 || event.keyCode == 32 ) {
              fileInput.focus();
          }
      });
      button.addEventListener( "click", function( event ) {
         fileInput.focus();
         return false;
      });
    }







$(function() {
    $("#input1, #span1").persianDatepicker({
       formatDate: "YYYY-0M-0D" ,
       showGregorianDate: 1,
     });
});

$(document).ready(function(){
  console.log("scroll");
  $('.nav-tabs').scrollingTabs({
    bootstrapVersion: 4 ,
    enableSwiping: true,
    widthMultiplier: 1,
    enableRtlSupport: true,
    // disableScrollArrowsOnFullyScrolled: true,
    cssClassLeftArrow: 'fa fa-chevron-left',
    cssClassRightArrow: 'fa fa-chevron-right'
  });
})






function showModal(el) {
  console.log(el);
  $('#signupType').css("display", "none");
  $('#signin').css("display", "none");
  $('#signinType').css("display", "none");
  $('#forgetPass').css("display", "none");
  $('#signup').css("display", "none");
  $('#' + el).css("display", "block");
}
