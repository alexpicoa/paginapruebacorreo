<?php

$header .= "Content-Type: text/plain; charset=UTF-8";


// Recaptcha
$recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify'; 
$recaptcha_secret = '6LdRXV4gAAAAAPXHKB5CdUGcH4mZMWl547GJHptx'; 
$recaptcha_response = $_POST['recaptcha_response']; 
$recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response); 
$recaptcha = json_decode($recaptcha); 

if($recaptcha->score >= 0.7){
    // OK. ERES HUMANO, EJECUTA ESTE CÓDIGO
}else{
    // KO. ERES ROBOT, EJECUTA ESTE CÓDIGO
}


// LLamando a los campos
$name = $_POST['name'];
$phone = $_POST['phone'];
$email_address = $_POST['email'];
$address = $_POST['address'];
$village = $_POST['village'];
$project = $_POST['project'];
$like = $_POST['like'];
$explain = $_POST['explain'];


$header  = "From: Con Permiso <info@conpermisopr.com>" . "\r\n";
$header .= "Reply-To: info@conpermisopr.com" . "\r\n";
$header .= "X-Mailer: PHP/" . phpversion(). "\r\n";
$header .= "BCC: ". implode(",", $destinatario) . "\r\n";


// datos para el correo

$destinatario = "alex.pico.amaya@gmail.com";
$asunto = "Formulario de Servicio - Web Con Permiso";

$carta  = "De: $name \n";
$carta .= "Teléfono: $phone \n";
$carta .= "Email: $email_address \n";
$carta .= "Dirección: $address \n";
$carta .= "Pueblo: $village \n";
$carta .= "Proyecto: $project \n";
$carta .= "Solicitud de servicio: $like \n";
$carta .= "Explicación: $explain";

// Enviando Mensaje
mail($destinatario, utf8_decode($asunto), utf8_decode($carta), $header);


header('location:index.html#contact')





?>