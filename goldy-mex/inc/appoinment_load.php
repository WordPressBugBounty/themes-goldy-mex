 <?php
 function contant_appoinment(){
 	?>

 	<?php
 	$appointment_name = $_POST['appointment_name'];
	$appointment_email = $_POST['appointment_email'];
	$appointment_monumber = $_POST['appointment_monumber'];
	$appointment_query = $_POST['appointment_query'];
	$to = $appointment_email;
	$subject = "Thank you for Submission.";
	$content = $appointment_name;
	$admin_email = get_option( 'admin_email' );
 	wp_mail($to, $subject,"Name : ".$content);

 }
add_action( 'wp_ajax_contant_appoinment', 'contant_appoinment');
add_action( 'wp_ajax_nopriv_contant_appoinment', 'contant_appoinment' );