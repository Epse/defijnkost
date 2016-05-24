<?php
$debug = false;
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
         $key != "factuur" && $key != "aantalpersonen" && $key != "aantalveelmensen" && $key != "afhaaldatum" && $key != "afhaaluur") {
        $email = $email . "\r\n" . $key;
      }
    }
  
  $headers = 'From: webmaster@defijnkost.be' . "\r\n" .
    'Reply-To: webmaster@defijnkost.be' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
  
  if ($debug || mail('epsedisp1@gmail.com', 'Bestelling Kaasschotel', $email, $headers)) {
    header('Location: http://www.defijnkost.be?bestel=success');
    echo "<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-71703017-1', 'auto');
  ga('send', 'pageview');

</script>";
    die();
  } else {
    header('Location: http://www.defijnkost.be/kaasschotels.html?bestel=mislukt');
    die();
  }
}
?>