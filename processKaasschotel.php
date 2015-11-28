<?php
if (!empty($_POST['bestelnaam'])) {
  $email = "Bestelling van De Fijnkost.\r\n\r\nNaam: " . $_POST['bestelnaam'] . "\r\nAdres: " . $_POST['adres'] .
    "\r\nE-mailadres: " . $_POST['email'] . "\r\nTelefoonnummer: " . $_POST['telefoon'] . "\r\nFactuur: " . $_POST['factuur'] .
    "\r\nAfhaaldatum: " . $_POST['afhaaldatum'] . "\r\nAfhaaluur: " . $_POST['afhaaluur'] . 
    "\r\n\r\nAantal Personen: " . $_POST['aantalpersonen'];
  
  if (!empty($_POST['aantalveelmensen'])) {
    $email = $email . "\r\nAantal Personen (meer dan 12) " . $_POST["aantalveelmensen"];
  }
  
  $email = $email . "\r\n\r\nKazen:";

    foreach($_POST as $key => $value) {
      if ($key != "bestelnaam" && $key != "adres" && $key != "email" && $key != "telefoon" &&
         $key != "factuur" && $key != "aantalpersonen" && $key != "aantalveelmensen") {
        $email = $email . "\r\n" . $key;
      }
    }
  
  $headers = 'From: webmaster@defijnkost.be' . "\r\n" .
    'Reply-To: webmaster@defijnkost.be' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
  
  if (mail('info@defijnkost.be', 'Bestelling Kaasschotel', $email, $headers)) {
    header('Location: http://www.defijnkost.be?bestel=success');
    die();
  } else {
    header('Location: http://www.defijnkost.be/kaasschotels.html?bestel=mislukt');
    die();
  }
}
?>