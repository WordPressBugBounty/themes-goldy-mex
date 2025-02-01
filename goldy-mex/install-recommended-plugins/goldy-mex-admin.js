jQuery(document).ready(function() {
	jQuery(".goldy_mex_install_plugins").click(function(){ 
		var $this = jQuery(this);
		var nonce = $this.attr('data-nonce');
		var demo_import_page = $this.attr('data-redirect');
		//console.log(demo_import_page);

		jQuery.ajax({
			type : "post",
			url : ajaxurl,
			data : {
				action: "goldy_mex_install_plugins", 
				nonce: nonce
			},
			beforeSend: function() {
				
				$this.css({
					'pointer-events' : 'none'
				}); // Disable button

				jQuery('.theme-info-wrapper .goldy_mex_dismiss').css({
					'pointer-events' : 'none'
				}); // Disable button

				$this.find('span').css({
					'padding-left' : '5px'
				}).text( 'Processing ... Please wait' );

				$this.find('.lodear_img').show();
				jQuery('.lodear_img').css({"width": "20px", "vertical-align": "middle"});
		    },
		    success: function() {
		     	window.location.href = demo_import_page;
		    }
		})
	});
});