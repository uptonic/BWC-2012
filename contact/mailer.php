<?php
/*
#####################################################

Mail form

FileName:   mailer.php
Author:		  Scott Upton, UPTONIC
Version:    2012.09.10

#####################################################
*/

/* new instance of mail class
-----------------------------------------------------*/

// suppress mailer errors
define('DISPLAY_XPM4_ERRORS', false);

// path to 'MAIL.php' file from XPM4 package
require_once 'lib/MAIL.php';

// initialize MAIL class
$m = new MAIL;


/* collect form values
-----------------------------------------------------*/

// required values from form submit
$name 		= $_POST["name"];
$email 		= $_POST["email"];
$phone 		= $_POST["phone"];

// optional values from form submit
$comments = $_POST["comments"];
$referral = $_POST["referral"];

// defaults
$mailTo		= 'donna@bw-construction.com';
$nameTo		= 'Donna Werner';
$subject	= 'BW Construction Inquiry - '.$name;


/* Utilities
-----------------------------------------------------*/

// Set variable "notice" to false
$notice = false;

// Validate email addresses
function validateEmail($email = NULL) {
	if (eregi("^([_a-z0-9-]+)(\.[_a-z0-9-]+)*@([a-z0-9-]+)(\.[a-z0-9-]+)*(\.[a-z]{2,4})$", $email) == false) return false;
	return true;
}


/* Process form
-----------------------------------------------------*/

// If required fields are blank, set notice flag
if (empty($name)||empty($email)||empty($phone)) {
	$notice = true;
}

// If email address, validate it
if ($email) {
	// Check for valid email format
	if (validateEmail($email) == false) {
		$notice = true;
	}
}

// If errors, report that to user and return false
// Otherwise send the email and flash a success message
if ($notice == true) {
	echo '<div><strong>Unfortunately, we found some errors.</strong> Please make sure you have provided values for the required fields. Also, please verify that your email address is correct before re-submitting the form.</div>';
	return false;
} else {
	// set from address
	$m->From($email, $name);
	// add to address
	$m->AddTo($mailTo, $nameTo);
	// add Cc field
	$m->AddCc($email, $name);
	// set subject
	$m->Subject($subject);
	// set text message
	$m->Text(
$name.',

Thank you for contacting BW Construction! Donna will be contacting you soon for more details about your project.

==================================================

'.$name.'
'.$phone.'
'.$email.'

ABOUT YOUR PROJECT
'.$comments.'

HOW DID YOU HEAR ABOUT US?
'.$referral.'

==================================================

If you have any questions, please contact Donna Werner via email at donna@bw-construction.com or by phone at (303)449-3298.');

	// send mail
	$s = $m->Send();

	// if mail was sent, confirm success to user, else throw error
	if($s) {
		echo '<div class="success"><strong>Thank you for your email!</strong> Please check your inbox for a message confirming it. We look forward to working with you!</div>';
	} else {
		echo "<div><strong>Message not sent.</strong> There was a problem on the server. Please try submitting your message again.</div>";
	}
}

//

?>
