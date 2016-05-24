<?php

  $headers = 'From: webmaster@defijnkost.be' . "\r\n" .
    'Reply-To: webmaster@defijnkost.be' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

$email = "Als je deze mail krijgt, gelieve door te sturen naar stef.plet@gmail.com"
  
mail('fijnkost@bikeparts.onmicrosoft.com', 'Testmail', $email, $headers