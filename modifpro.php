<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Modify-Page</title>
</head>
<body>
<div class="container mt-3">
<?php
session_start();
ob_start();
try {
    if (isset($_GET['id_produit'])) {
        $id_produit = $_GET['id_produit'];
        $connect = mysqli_connect('localhost', 'root', '', 'ecommercebd');
        echo "connexion réussie <br>";
        $requete = mysqli_query($connect, "SELECT * FROM PRODUITS WHERE id_produit=$id_produit");
        if (mysqli_num_rows($requete) > 0) {
            while ($row = mysqli_fetch_assoc($requete)) {
                echo '<form action="" method="post" enctype="multipart/form-data">';
                echo '<h1>Modification de la recette</h1>';
                echo '<input type="hidden" name="id_produit" value="' . $id_produit . '">';
                echo '<label for="reference">reference de la recette</label>';
                echo '<input type="text" name="reference" placeholder="99-x-99" value="' . $row["reference"] . '" required><br><br>';
                echo '<label for="categorie">Catégorie</label>';
                echo '<input type="text" name="categorie" placeholder="Catégorie" required value="' . $row["categorie"] . '"><br><br>';
                echo '<label for="titre">Titre</label>';
                echo '<input type="text" name="titre" placeholder="Titre" value="' . $row["titre"] . '" required ><br><br>';
                echo '<label for="description">Description</label>';
                echo '<input type="text" name="description" placeholder="56.00" value="' . $row["description"] . '"  required><br><br>';
                echo '<label for="couleur">Couleur</label>';
                echo '<input type="text" id="couleur" name="couleur" value="' . $row["couleur"] . '"><br><br>';
                echo '<label for="taille">Taille</label>';
                echo '<input type="text" id="taille" name="taille" value="' . $row["taille"] . '"><br><br>';
                echo '<label for="public">Public</label>';
                echo '<input type="text" id="public" name="public" value="' . $row["public"] . '"><br><br>';
                echo '<label for="photo">Photo</label>';
                echo '<img src="data:image/jpeg;base64,'.base64_encode($row["photo"]).'" width="100" height="100"><br><br>';
                echo '<label for="photo">Photo</label>';
                echo '<input type="file" name="photo" accept="image/*"><br><br>';
                echo '<label for="prix">Prix</label>';
                echo '<input type="text" name="prix" value="'. $row["prix"] .'" required><br><br>';
                echo '<label for="stock">Stock</label>';
                echo '<input type="text" name="stock" value="'. $row["stock"] .'" required><br><br>';
                echo '<label for="date">Date inscrite</label>';
                echo '<input type="date" name="date" value="'. $row["dateinscrite"] .'" required><br><br>';
                echo '<button type="submit" class="btn btn-outline-success" name="submit">Modifier</button>';
                echo '</form>';
            }
        }
    }
} catch (Exception $e) {
    echo "il y a une erreur dans le code de ma connexion";
}

    if (isset($_POST['submit'])) {
        $id_produit = $_POST['id_produit'];
        if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
            $image = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
            updateBD($_POST['reference'], $_POST['categorie'], $_POST['titre'], $_POST['description'], $_POST['couleur'],$_POST['taille'],$_POST['public'], $image,$_POST['prix'],$_POST['stock'],$_POST['date'],$id_produit);
            echo "vous avez modifié une recette";
            header('Location:admin.php');
            exit();
        } else {
            updateBDD($_POST['reference'], $_POST['categorie'], $_POST['titre'], $_POST['description'], $_POST['couleur'],$_POST['taille'],$_POST['public'],$_POST['prix'],$_POST['stock'],$_POST['date'],$id_produit);
            echo "vous avez modifié une recette";
            header('Location:admin.php');
            exit();
        }
    }

    function updateBD($reference, $categorie, $titre, $description, $couleur,$taille,$public, $photo , $prix,$stock,$date, $id_produit) {
        try {
            $connect = mysqli_connect('localhost', 'root', '', 'ecommercebd');
            echo "connexion réussie <br>";
            mysqli_query($connect, "UPDATE PRODUITS SET reference='$reference', categorie='$categorie', titre='$titre', prix='$prix', description='$description', couleur='$couleur',taille='$taille', public='$public', photo='$photo', stock='$stock',dateinscrite='$date' WHERE id_produit=$id_produit");
        } catch (Exception $e) {
            echo "il n'y a une erreur dans le code de ma connexion <br>";
        }
    }
    function updateBDD($reference, $categorie, $titre, $description, $couleur,$taille,$public, $prix,$stock,$date,$id_produit) {
        try {
            $connect = mysqli_connect('localhost', 'root', '', 'ecommercebd');
            echo "connexion réussie <br>";
            mysqli_query($connect, "UPDATE PRODUITS SET reference='$reference', categorie='$categorie', titre='$titre', prix='$prix', description='$description', couleur='$couleur', taille='$taille', public='$public', stock='$stock',dateinscrite='$date' WHERE id_produit=$id_produit");
        } catch (Exception $e) {
            echo "il n'y a une erreur dans le code de ma connexion <br>";
        }
    }
    ob_end_flush();
?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
