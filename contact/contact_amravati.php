<?php
// check if fields passed are empty
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['mobile']) 		||
   empty($_POST['property']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$mobile = $_POST['mobile'];
$course = $_POST['property'];
$message = $_POST['message'];
	
// create email body and send it	
$to = 'shiv_22nov@rediffmail.com, swapnil.nagpure@gmail.com'; // ----->>> put your email to receive mails
$email_subject = "Contact form submitted by:  $name";
$email_body = "You have received a new message. \n\n".
				  " Here are the details:\n \nName: $name \n ".
				  "Email: $email_address \n mobile: $mobile\n Property: $course \n Message \n $message";
$headers = "From: shiv_nov22@rediffmail.com\n";
$headers .= "Reply-To: $email_address";	
mail($to,$email_subject,$email_body,$headers);
return true;			
?>