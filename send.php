<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST["name"]);
  $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
  $message = htmlspecialchars($_POST["message"]);

  $to = "support@moa-it.ch"; 
  $subject = "Nouveau message depuis ton site";
  $body = "Nom : $name\nEmail : $email\n\nMessage :\n$message";
  $headers = "From: $email\r\nReply-To: $email";

  if (mail($to, $subject, $body, $headers)) {
    echo "Message envoyé avec succès.";
  } else {
    echo "Erreur lors de l'envoi du message.";
  }
}
?>
