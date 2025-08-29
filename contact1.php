<?php 
$confirmation="";

if ($_SERVER["RESQUEST_METHOD"]== "POST"){

    $nom= htmlspecialchars($_post["nom"]);
    $email = htmlspecialchars($_post["email"]);
    $message= htmlspecialchars($_POST["probleme"]);

    //connexion a la base de donner(hostinger)

    
    $host="localhost";
    $dbname="";
    $username="";
    $password="";

    try {
        $pdo= new PDO("mysql: host=$host; dbname=$dbname; charset="utf8", $username, $password");
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

            //INSERTION EN BASE
        $sql="INSERT INTO contact(nom, email, probleme, date_envoi) VALUE(:nom, :email, :probleme, NOM())";
        $stmt= $pdo->prepare($sql);
        $stmt->execute([
            ':nom'-> $nom,
            ':email'-> $email,
            ':probleme'-> $probleme
        ]);
        $confirmation= "Merci $nom votre message a été envoyé avec succès. ";

    }catch (PDOEception $e){
        $confirmation= "Erreur : ". $e->getMessage();
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
    
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Contactez-nous</h2>
        
            <?php if ($confirmation):?>
                <div class="alert alert-succes text-center"><?php echo $confirmation;?></div>
            <?php endif?>
            <div class="row">
                <!-- formulaire -->
                <div class="col-md-6">
                    <form method="POST" action="contact.php">
                        <div class="mb-4">
                            <label class="form-label">Nom</label>
                            <input type="text" name="nom" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="" required>
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Message</label>
                            <textarea name="message" id="" class="form-control" required rows="5"></textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Envoyer</button>
                    </form>
                </div>
                <!--coordonner-->
                <div class="col-md-6">
                    <h5 class="fw-bold">Nos coordonnées</h5>
                    <p><i class="bi bi-geo-alt-fill"></i>Galicia, Espagne</p>
                    <p><i class="bi bi-envelope-fill"></i>support@sadiloop.com</p>
                    <p><i class="bi bi-phone-fill"></i>+0034604899711</p>
                    <div>
                        <a href=""></a>
                        <a href=""></a>
                        <a href=""></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>