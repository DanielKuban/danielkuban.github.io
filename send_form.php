<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars($_POST["name"]);
  $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
  $message = htmlspecialchars($_POST["message"]);

  if ($email && !empty($message)) {
    $to = "deine@emailadresse.at";  // ✅ Hier deine Zieladresse eintragen
    $subject = "Neue Nachricht von $name über das Kontaktformular";
    $body = "Name: $name\nE-Mail: $email\n\nNachricht:\n$message";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject, $body, $headers)) {
      echo "Danke für Ihre Nachricht!";
    } else {
      echo "Beim Senden der Nachricht ist ein Fehler aufgetreten.";
    }
  } else {
    echo "Ungültige Eingabe.";
  }
}
?>