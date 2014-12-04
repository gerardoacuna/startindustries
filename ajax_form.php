<?php
	//hide errors
	error_reporting(0); 

	//wait a second
	sleep(1);
	
	//your email
	$to =  "sales@startindustriessupply.com";
			
	//message subject
	$subject = "Message from your site";

	//data from form. 
	$name = $_POST['name'];
	$email = $_POST['email'];
	$email = $_POST['company'];
	$email = $_POST['phone'];
	$message = $_POST['message'];
	
	
	//valid message
	if(empty($message) || $message == 'Message') {
		$error = 'Please write a message.';
	}

	//valid email
	if(!preg_match("/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/", $email)) {
		$error = 'Please enter a valid email.';
	}
	
	//valid name
	if(empty($name) || $name == 'Your name') {
		$error = 'Please write your name.';
	}

	// there is an error:
	if($error) {
		$result = '<p class="error">'.$error.'</p>';
	} else {
		//message text
		$body = "Someone has sent a email from your site:\r\n";
		$body .= "Name: ".$name."\r\n";
		$body .= "Email: ".$email."\r\n";
		$body .= "Company: ".$company."\r\n";
		$body .= "Phone: ".$phone."\r\n";
		$body .= "Message: ".$message."\r\n";
		
		//headers
		$headers = "From: ".$email."\r\n";
		
		//try to send
		if(mail($to, $subject, $body, $headers)) {
			$result = '<p class="success">Message Sent. Thank you for your interest.</p>';
		} else {
			$result = '<p class="error">Sorry, your message couldn&#39;t be sent. </p>';
		}
	}
	
	//output
	echo $result;
?>