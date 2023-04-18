<?php
$header = "From: $email\r\n";
$header .= "Reply-To: $email\r\n";
$header .= "Content-Type: application/x-www-form-urlencoded\r\n";

if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$m_subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$to = "h.aminehalal@gmail.com"; // Change this email to your //
$subject = "$m_subject:  $name";
$body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\n\nEmail: $email\n\nSubject: $m_subject\n\nMessage: $message";
$header = "From: $email";
$header .= "Reply-To: $email";	

if (mail($to, $subject, $body, $header)) {
  // email sent successfully
} else {
  // email failed to send
  $body .= "\n\nError: The email could not be sent.";
}
if(!mail($to, $subject, $body, $header))
  http_response_code(500);
?>
