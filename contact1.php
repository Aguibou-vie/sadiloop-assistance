<?php
$confirmation= "";

//traitement de formulaire
if ($_SERVER["REQUEST_METHOD"]== "POST"){
    $nom= htmlspecialchars($_POST["nom"]);
    $email= htmlspecialchars($_POST["email"]);
    
}
?>