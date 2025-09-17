<?php
$confirmation = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST["nom"]);
    $email = htmlspecialchars($_POST["email"]);
    $sujet = htmlspecialchars($_POST["sujet"]);
    $message = htmlspecialchars($_POST["message"]);

    // Connexion à la base de données
    $host = "localhost";
    $dbname = "u749724029_sadiloop_001";
    $username = "u749724029_sadiloop_admin";
    $password = "Sadiloop321@fsdlp";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO demandes (nom, email, sujet, message, date_envoi) 
                VALUES (:nom, :email, :sujet, :message, NOW())";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'nom' => $nom,
            'email' => $email,
            'sujet' => $sujet,
            'message' => $message
        ]);

        $confirmation = "Merci $nom, votre demande d’aide a été envoyée avec succès.";
    } catch (PDOException $e) {
        $confirmation = "Erreur : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demande d'aide - Sadiloop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
    body {
        background-color: #1f2340;
        color: white;
    }
    .form-card {
        background-color: #ffffff;
        color: #000;
        border-radius: 1rem;
    }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand text-primary" href="index.html">
        <img src="assets/img/Sadiloop.png" alt="Logo" width="40" height="30" class="d-inline-block align-text-top">
        Sadiloop$
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarmain">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarmain">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item"><a class="nav-link" href="index.html">Accueil</a></li>
            <li class="nav-item"><a class="nav-link" href="services.html">Services</a></li>
            <li class="nav-item"><a class="nav-link" href="projects.html">Projets</a></li>
            <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
        </ul>
        <a class="btn btn-outline-warning active" href="request.php">Demande d'aide</a>
        </div>
    </div>
</nav>

<!-- Section demande d'aide -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center text-primary mb-4">🆘 Demande d'aide</h2>
        <p class="text-center text-light mb-5">
        Décrivez votre problème et notre équipe vous contactera rapidement.
        </p>

        <?php if (!empty($confirmation)) : ?>
        <div class="alert alert-info text-center"><?= $confirmation ?></div>
        <?php endif; ?>

        <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow form-card p-4">
            <form method="POST" id="helpForm">
                <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
                </div>
                <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                <label for="sujet" class="form-label">Sujet</label>
                <input type="text" class="form-control" id="sujet" name="sujet" required>
                </div>
                <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
                <div class="d-grid">
                <button type="submit" class="btn btn-primary btn-lg">Envoyer</button>
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
</section>

<!-- Footer -->
<footer class="text-white pt-5 pb-3 mt-5" style="background-color: #1f2340">
    <div class="container">
        <div class="text-center">
        <p class="mb-0">&copy; 2025 Sadiloop Corporation – Tous droits réservés.</p>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
  // Validation simple avec JS
    document.getElementById('helpForm').addEventListener('submit', function(e){
        const email = document.getElementById('email').value;
        if(!email.includes('@')){
        alert("Veuillez entrer un email valide !");
        e.preventDefault();
        }
    });
</script>
</body>
</html>
