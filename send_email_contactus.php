<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['customer_name'];
    $email = $_POST['customer_emailaddress'];
    $subject = $_POST['customer_contact_number'];
    $message = $_POST['customer_message'];

    // Email address where you want to receive messages
    $to = "sandeepacharithonlinersp92@gmail.com";

    // Email content
    $email_subject = "New Message from Contact Form";
    $email_body = "You have received a new message from the contact form on your website.\n\n".
                  "Name: $name\n".
                  "Email: $email\n".
                  "Subject: $subject\n".
                  "Message: $message\n";

    // Send email
    if (mail($to, $email_subject, $email_body)) {
        echo "Thank you! Your message has been sent.";
    } else {
        echo "Oops! Something went wrong and we couldn't send your message.";
    }
}
?>
