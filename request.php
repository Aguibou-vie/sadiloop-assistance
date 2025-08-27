<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    $confirmation ="";
     //parametrage de connexion a la base de donner 
    $host="localhost";
    $dbname="u749724029_sadiloop_001";
    $username="u749724029_sadiloop_admin";
    $password="Sadiloop321@#sdlp";

    try{
        $pdo= new PDO("mysql:host=$host; dbname=$dbname; charset=utf8", $username , $password);
        $pdo-> setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
        echo "Connexion reussie!";
    }catch (PDOException $e){
        die("Erreur de connexion a la base : ". $e -> getMessage());
    }

    //traitement du formulaire

    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $nom = htmlspecialchars($_POST["nom"]);
        $email= htmlspecialchars($_POST["email"]);
        $probleme= htmlspecialchars($_POST["probleme"]);

        //insertion dans la base 
        $sql= "INSERT INTO demandes (nom,email,probleme, date_envoi) VALUES (:nom, :email , :probleme, NOW());"
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
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande d'aide - Sadilop Corporation</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="container">
        <nav>
            <ul>
                <li><a href="index.html">Accueil</a></li>
                <li><a href="services.html">Services</a></li>
                <li><a href="request.php">Demande d'aide</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="projects.html">Projets</a></li>
            </ul>
        </nav>
    </header>
    <section class="contact">
        <div class="container">
            <h2>Demande d'aide</h2>
            <p>
                Décris ton problème, nous te répondrons rapidement.
            </p>
            <?php if ($confirmation):?>
            <p style="color:green; font-weight: bold;"><?php echo $confirmation?></p>
            <?php endif;?>
            <form  method="POST" action="request.php">
                <input type="text" name="nom" placeholder="Votre nom" required>
                <input type="email" name="email" placeholder="Votre email">
                <textarea name="probleme" placeholder="d'ecrire ton problem ici..." rows="5" id=""></textarea>
                <button type="submit" class="btn">Envoyer la demande</button>
            </form>
        </div>
    </section>

    <footer class="container">
        <p>&copy; 2025 Sadiloop Corporation - Tous droits réservés.</p>
    </footer>
</body>
</html>