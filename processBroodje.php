<?php
$debug = false;
if (!empty($_POST['naam'])) {
  $email = "Bestelling van De Fijnkost.\r\n\r\nNaam: " . $_POST['naam'] . "\r\nAdres: " . $_POST['adres'] .
    "\r\nE-mailadres: " . $_POST['email'] . "\r\nTelefoonnummer: " . $_POST['tel'];
  
  $email = $email . "\r\n\r\nBroodjes:";

    foreach($_POST as $key => $value) {
      if ($key != "naam" && $key != "adres" && $key != "email" && $key != "tel" && $value != 0) {
        $email = $email . "\r\n" . $key . "\t\t" . $value;
      }
    }
  
  $headers = 'From: webmaster@defijnkost.be' . "\r\n" .
    'Reply-To: webmaster@defijnkost.be' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
  
  if ($debug || mail('epsedisp1@gmail.com', 'Bestelling Broodjes', $email, $headers)) {
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