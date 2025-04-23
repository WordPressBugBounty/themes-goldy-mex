jQuery( document ).ready(function() {

    // new WOW().init();
    var wow = new WOW(
      {
        boxClass:     'wow',
        animateClass: 'animated',
        mobile:       true,
      }
    );
    wow.init();

    var display_captcha_field = goldy_mex_appoinment.goldy_mex_book_an_appointment_enable_captcha;
    if(display_captcha_field == ''){
      jQuery('.validation_error').hide();
      jQuery('.email_success').hide();
      jQuery( "#appoinment_book" ).on( "click", function(e) {
        e.preventDefault();
        var appointment_name = jQuery("#appointment_name").val();
        var appointment_email = jQuery("#appointment_email").val();
        var appointment_monumber = jQuery("#appointment_monumber").val();
        var appointment_query = jQuery("#appointment_query").val();

        if(appointment_name == '' || appointment_email == '' || appointment_monumber == '' || appointment_query == ''){
            jQuery('.validation_error').html("All field are required.").show();
            jQuery('.email_success').html("").hide();
        }else{
          jQuery('.validation_error').html('').hide();
          jQuery('.email_success').html('Email sent.').show();
            jQuery.ajax({
            type: 'post',
            url: goldy_mex_appoinment.ajaxurl,
            data: {action: "contant_appoinment" , 
                  appointment_name: appointment_name, 
                  appointment_email: appointment_email, 
                  appointment_monumber: appointment_monumber, 
                  appointment_query: appointment_query
                },
            success: function (data) {

            }
          });
          jQuery('.appoinment_reset')[0].reset();
        }
        return false;
      });
    }else{
      jQuery('.validation_error').hide();
      jQuery('.email_success').hide();
      
      var siteKey = document.querySelector('.g-recaptcha');

      if (siteKey) {
        siteKey = siteKey.getAttribute('data-sitekey');
      }
      // Check if the site key is empty, and if so, remove the reCAPTCHA element
      if (!siteKey || siteKey === "") {
          jQuery('.g-recaptcha').remove();
      }
      jQuery( "#appoinment_book" ).on( "click", function(e) {
        e.preventDefault();
        var appointment_name = jQuery("#appointment_name").val();
        var appointment_email = jQuery("#appointment_email").val();
        var appointment_monumber = jQuery("#appointment_monumber").val();
        var appointment_query = jQuery("#appointment_query").val();
        
        if (!siteKey || siteKey === "") {
            // Display an error message in the form
            jQuery('.validation_error').html("Site key is missing. Please contact the administrator to configure reCAPTCHA.").show();
            jQuery('.email_success').html("").hide();
        }else {
            var recaptchaResponse = grecaptcha.getResponse();

            if (appointment_name == "" || appointment_email == "" || appointment_monumber == "" || appointment_query == "") {
              jQuery('.validation_error').html("All fields are required.").show();
              jQuery('.email_success').html("").hide();
            } else if (recaptchaResponse.length === 0) {
              // Check if reCAPTCHA response is empty
              jQuery('.validation_error').html("Plese check on the reCAPTCHA box.").show();
              jQuery('.email_success').html("").hide();
            }else{
            jQuery('.validation_error').html('').hide();
            jQuery('.email_success').html('Email sent.').show();
              jQuery.ajax({
              type: 'post',
              url: goldy_mex_appoinment.ajaxurl,
              data: {action: "contant_appoinment" , 
                appointment_name: appointment_name, 
                appointment_email: appointment_email, 
                appointment_monumber: appointment_monumber, 
                appointment_query: appointment_query
              },
              success: function (data) {
                grecaptcha.reset();
              }
            });
            jQuery('.appoinment_reset')[0].reset();
          }
        }
        return false;
      });
    }

    function goldy_reload_loader() {
        jQuery(".goldy-reload-content").fadeOut('slow');
    }

    jQuery(window).on('load', function () {
        goldy_reload_loader();
    });
    
});