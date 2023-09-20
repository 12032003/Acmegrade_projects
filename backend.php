<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Basic input validation (you should implement more robust validation)
    if (empty($name) || empty($email) || empty($message)) {
        echo "Please fill in all required fields.";
    } else {
        // Send email (you need to configure email settings)
        $to = "your@email.com"; // Replace with your email address
        $subject = "New Contact Form Submission";
        $headers = "From: $email";

        // Compose the email message
        $email_message = "Name: $name\n";
        $email_message .= "Email: $email\n";
        $email_message .= "Message:\n$message";

        // Send the email
        if (mail($to, $subject, $email_message, $headers)) {
            echo "Your message has been sent successfully.";
        } else {
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
}
?>