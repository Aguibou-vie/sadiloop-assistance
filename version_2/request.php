<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1); #en cas de erreur a la connexion 

    $confirmation ="";
     //parametrage de connexion a la base de donner 
    $host="localhost";
    $dbname="u749724029_sadiloop_001";
    $username="u749724029_sadiloop_admin";
    $password="Sadiloop321@#sdlp";

    try{
        $pdo= new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $username , $password);
        $pdo-> setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        //echo "Connexion reussie!";
    }catch (PDOException $e){
        die("Erreur de connexion a la base : ". $e -> getMessage());
    }

    //traitement du formulaire

    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $nom = htmlspecialchars($_POST["nom"]);
        $email= htmlspecialchars($_POST["email"]);
        $probleme= htmlspecialchars($_POST["probleme"]);

        //insertion dans la base 
        $sql= "INSERT INTO demandes (nom,email,probleme, date_envoi) VALUES (:nom, :email , :probleme, NOW())";
        $stmt= $pdo ->prepare($sql);
        $stmt -> execute([
            ':nom' => $nom,
            ':email' => $email,
            ':probleme' => $probleme
        ]);

        //message de confirmation
        $confirmation= "Merci $nom, ta demande a bien été reçue. Nous te contacterons rapidement à $email ";
    }   
    

?>
