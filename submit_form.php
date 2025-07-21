<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars(trim($_POST["name"]));
    $email   = htmlspecialchars(trim($_POST["email"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    $to = "ankushnirmalkar72@gmail.com";
    $subject = "New Contact Message from $name";
    $body = "You received a new message from your contact form:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Message:\n$message\n";
    $headers = "From: $email\r\nReply-To: $email";

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if (mail($to, $subject, $body, $headers)) {
            echo "<h2>Message sent successfully!</h2>";
        } else {
            echo "<h2>Sorry, your message could not be sent.</h2>";
        }
    } else {
        echo "<h2>Invalid email address.</h2>";
    }
} else {
    echo "<h2>Access denied.</h2>";
}
?>
