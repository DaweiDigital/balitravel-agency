<?php

/**
 * Redirect CF7 After Sending
 */
add_action( 'wp_footer', 'cf7_footer' );
	function cf7_footer() { ?>
	<script type="text/javascript">
		document.addEventListener( 'wpcf7mailsent', function( event ) {
			if ( '952' == event.detail.contactFormId ) {
				location = '/uspesne-odeslano/';
				// $.fancybox.close();
			}
		}, false );
	</script>
<?php }
