<?php
$confirmation = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = htmlspecialchars($_POST["nom"]);
    $email = htmlspecialchars($_POST["email"]);
    $message = htmlspecialchars($_POST["message"]);

    // Connexion à la base de données (Hostinger)
    $host = "localhost";
    $dbname = "u749724029_sadiloop_001";
    $username = "u749724029_sadiloop_admin";
    $password = "Sadiloop321@fsdlp";

    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insertion en base
        $sql = "INSERT INTO contact (nom, email, message, date_envoi) 
                VALUES (:nom, :email, :message, NOW())";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'nom' => $nom,
            'email' => $email,
            'message' => $message
        ]);

        $confirmation = "Merci $nom, votre message a été envoyé avec succès.";
    } catch (PDOException $e) {
        $confirmation = "Erreur : " . $e->getMessage();
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <title>Contact - Sadiloop</title>
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
<div class="container py-5">
    <div class="row justify-content-center">
        <!-- Colonne formulaire -->
        <div class="col-md-6">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body p-4">
                    <h2 class="text-center mb-4 text-primary">📩 Contactez-nous</h2>
                    
                    <!-- Formulaire -->
                    <form method="POST" action="contact.php">
                        <!-- Nom -->
                        <div class="mb-3">
                            <label for="nom" class="form-label fw-bold">Nom</label>
                            <input type="text" class="form-control rounded-3" id="nom" name="nom" required>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label fw-bold">Email</label>
                            <input type="email" class="form-control rounded-3" id="email" name="email" required>
                        </div>

                        <!-- Message -->
                        <div class="mb-3">
                            <label for="message" class="form-label fw-bold">Message</label>
                            <textarea class="form-control rounded-3" id="message" name="message" rows="5" required></textarea>
                        </div>

                        <!-- Bouton -->
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg rounded-3">
                                Envoyer
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Colonne coordonnées -->
        <div class="col-md-4 mt-4 mt-md-0">
            <div class="card shadow-lg border-0 rounded-4 p-4 h-100">
                <h4 class="fw-bold mb-3">📍 Nos coordonnées</h4>
                <p><i class="bi bi-geo-alt-fill text-primary"></i> Galicia, Espagne</p>
                <p><i class="bi bi-envelope-fill text-primary"></i> support@sadiloop.com</p>
                <p><i class="bi bi-phone-fill text-primary"></i> +34 604 899 711</p>
                <div class="d-flex gap-3 mt-3">
                    <a href="#" class="text-dark fs-4"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-dark fs-4"><i class="bi bi-twitter"></i></a>
                    <a href="https://github.com/Aguibou-vie" class="text-dark fs-4"><i class="bi bi-github"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
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


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>