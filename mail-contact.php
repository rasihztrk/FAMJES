<?php

	$to = "rasihozturk000@gmail.com"; 
	$from  = $_POST['email']; 
	$sender_name = $_POST['name'];
	$adress = $_POST['adress'];
	$service = $_POST['Subject'];
	$note = $_POST['note'];

	$subject = "Form submission";

	$message = $sender_name . " has send the contact message. His / Her contact Service is " . $service . " and his / her adress is "  . $adress . ". He / she wrote the following... ". "\n\n" . $note;

	$headers = 'From: ' . $from;
	mail($to, $subject, $message, $headers);

?>