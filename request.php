<!DOCTYPE html>
<html lang="en">
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
                <li><a href="request.php">Demande d'aide<</a></li>
                <li><a href="Contact.php">Contact</a></li>
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
            
            <form  method="POST" action="request.php">
                <input type="text" name="nom" placeholder="votre email" required>
                <input type="email" name="email" placeholder="">
            </form>
        </div>
    </section>
</body>
</html>