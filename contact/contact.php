<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    
    $to = "nderituc38@gmail.com";
    $subject = "Feedback from $name";

    // Email message
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message";

    // Email headers
    $headers = "From: $email";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "<p>Your feedback has been sent. Thank you!</p>";
    } else {
        echo "<p>There was an error sending your feedback. Please try again later.</p>";
    }
} else {
    // If the request method is not POST, redirect to the form page
    header("Location: contact_us.html");
    exit();
}
?>
