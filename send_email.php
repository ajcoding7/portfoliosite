<?php
// Validate and sanitize user input
$name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

// Check if all required fields are provided
if (empty($name) || empty($email) || empty($message)) {
  echo "Please fill in all required fields.";
  exit;
}

// Set up email parameters
$to = "ajcoding796@gmail.com";
$subject = "New Message from your Portfolio website";
$headers = "From: $name <$email>" . "\r\n";
$body = "Name: $name\nEmail: $email\nMessage: $message";

// Send the email
$mailSent = mail($to, $subject, $body, $headers);

// Check if the email was sent successfully
if ($mailSent) {
  echo "Email sent successfully!";
} else {
  echo "Failed to send email.";
}
?>
