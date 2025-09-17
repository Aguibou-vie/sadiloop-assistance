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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!--  Navbar Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand text-primary" href="#">
                <img src="assets/img/Sadiloop.png" alt="Logo" width="40" height="30" class="d-inline-block align-text-top">
                Sadiloop$ </a>

            <!--  Menu mobile (burger) -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarmain">
            <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Liensdu menu -->
            <div class="collapse navbar-collapse" id="navbarmain">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.html">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="services.html">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="projects.html">Projets</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                </ul>
                <a class="btn btn-outline-warning" href="request.php">Demande d'aide</a>
            </div>
        </div>
    </nav>










        <footer class=" text-white pt-5 pb-3 mt-5" style="background-color: #1f2340">
        <div class="container" style="background-color: #1f2340">
            <div class="row">
                <!-- Colonne 1 : Logo + présentation -->
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold mb-3">Sadiloop Corporation</h5>
                    <p>Assistance informatique rapide, création de sites web modernes et accompagnement technique.</p>
                </div>
                <!-- Colonne 2 : Liens utiles -->
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold mb-3">Navigation</h5>
                    <ul class="list-unstyled">
                        <li><a href="index2.html" class="text-white text-decoration-none">Accueil</a></li>
                        <li><a href="services.html" class="text-white text-decoration-none">Services</a></li>
                        <li><a href="projects.html" class="text-white text-decoration-none">Projets</a></li>
                        <li><a href="request.php" class="text-white text-decoration-none">Demande d'aide</a></li>
                    </ul>
                </div>
                <!-- Colonne 3 : contact &reseau-->
                <div class="col-md-4 mb-4">
                    <h5 class="fw-bold mb-3">Contact</h5>
                    <p><i class="bi bi-envelope-fill"></i> support@sadiloop.com</p>
                    <p><i class="bi bi-phone-fill"></i> +34 604 899 711</p>
                    <div class="d-flex gap-3 mt-3">
                        <a href="#" class="text-white fs-4"><i class="bi bi-facebook"></i></a>
                        <a href="#" class="text-white fs-4"><i class="bi bi-twitter"></i></i></a>
                        <a href="https://github.com/Aguibou-vie" class="text-white fs-4"><i class="bi bi-github"></i></a>
                    </div>
                </div>
            </div>
            <hr class="border-light">
        </div>
    </footer>
</body>
</html>
