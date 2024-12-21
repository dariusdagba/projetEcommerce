<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Modify-Member-Page</title>
</head>
<body>
<div class="container mt-3">
<?php
try {
    if (isset($_GET['idmembre'])) {
        $idmembre = $_GET['idmembre'];
        $connect = mysqli_connect('localhost', 'root', '', 'ecommercebd');
        echo "connexion réussie <br>";
        $requete = mysqli_query($connect, "SELECT * FROM MEMBRES WHERE idmembre='$idmembre'");
        if (mysqli_num_rows($requete) > 0) {
            while ($row = mysqli_fetch_assoc($requete)) {
                echo '<form action="" method="post">';
                echo '<h1>Modification du membre</h1>';
                echo '<input type="hidden" name="idmembre" value="' . $idmembre . '">';
                echo '<label for="nom">Nom</label>';
                echo '<input type="text" name="nom" placeholder="Nom" value="' . $row["nom"] . '" required><br><br>';
                echo '<label for="prenom">Prénom</label>';
                echo '<input type="text" name="prenom" placeholder="Prénom" required value="' . $row["prenom"] . '"><br><br>';
                echo '<label for="telephone">Téléphone</label>';
                echo '<input type="text" name="telephone" placeholder="Téléphone" value="' . $row["telephone"] . '" required ><br><br>';
                echo '<label for="adresse">Adresse</label>';
                echo '<input type="text" name="adresse" placeholder="Adresse" value="' . $row["adresse"] . '"  required><br><br>';
                echo '<label for="date">Date de naissance</label>';
                echo '<input type="date" id="date" name="date" value="' . $row["datedenaissnace"] . '"><br><br>';
                echo '<label for="login">Login</label>';
                echo '<input type="text" name="login" placeholder="Login" value="'. $row["login"] .'" required><br><br>';
                echo '<label for="password">Mot de passe</label>';
                echo '<input type="password" name="password" placeholder="Mot de passe" value="'. $row["password"] .'" required><br><br>';
                echo '<button type="submit" class="btn btn-outline-success" name="submit">Modifier</button>';
                echo '</form>';
            }
        }
    }
} catch (Exception $e) {
    echo "erreur de connexion";
}

if (isset($_POST['submit'])) {
    $idmembre = $_POST['idmembre'];
    updateBDDD($_POST['nom'], $_POST['prenom'], $_POST['telephone'], $_POST['adresse'], $_POST['date'], $_POST['login'], $_POST['password'], $idmembre);
    echo "vous avez modifié un membre";
    header('Location: admin.php');
    exit();
}

function updateBDDD($nom, $prenom, $telephone, $adresse, $date, $login, $password, $idmembre) {
    try {
        $connect = mysqli_connect('localhost', 'root', '', 'ecommercebd');
        echo "connexion réussie <br>";
        mysqli_query($connect, "UPDATE MEMBRES SET nom='$nom', prenom='$prenom', telephone='$telephone', adresse='$adresse', datedenaissnace='$date', login='$login', password='$password' WHERE idmembre='$idmembre'");
    } catch (Exception $e) {
        echo "il y a une erreur dans le code de ma connexion <br>";
    }
}
?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
