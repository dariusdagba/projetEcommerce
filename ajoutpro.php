<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Add-product-page</title>
</head>
<body>
<div class="container mt-3">
    <form action="" method="POST" enctype="multipart/form-data">
        <h1>Formulaire d'ajout de produit</h1>
        <label for="reference">Réference du produit</label>
        <input type="text" name="reference" placeholder="99-x-99" required><br><br>
        <label for="categorie">Catégorie</label>
        <input type="text" name="categorie" placeholder="Catégorie" required><br><br>
        <label for="titre">Titre</label>
        <input type="text" name="titre" placeholder="Titre" required><br><br>
        <label for="description">Description</label>
        <input type="text" name="description" placeholder="Description" required><br><br>
        <label for="couleur">Couleur</label>
        <input type="text" name="couleur" placeholder="Couleur" required><br><br>
        <label for="taille">taille</label> 
        <input type="text" id="taille" name="taille" placeholder="M, L, XL, XXL" required><br><br>
        <label for="public">Public</label> 
        <input type="text" id="public" name="public" placeholder="m , f, mixte" required><br><br>
        <label for="photo">Photo</label>
        <input type="file" name="photo" accept="image/*" required><br><br>
        <label for="prix">Prix</label> 
        <input type="text" id="prix" name="prix" placeholder="45" required><br><br>
        <label for="stock">Stock</label> 
        <input type="text" id="stock" name="stock" placeholder="Stock" required><br><br>
        <label for="dateinscrite">Date inscrite</label> 
        <input type="date" id="dateinscrite" name="dateinscrite" placeholder="Date inscrite" required><br><br>
        <button type="submit" class="btn btn-outline-success">Ajouter</button>
    </form>
</div>
<?php
        session_start();
        if(isset($_POST['reference'])&& isset($_POST['categorie'])&& isset($_POST['titre']) && isset($_POST['couleur'])&& isset($_POST['taille'])&& isset($_POST['public'])&& isset($_POST['description'])& isset($_POST['prix'])& isset($_POST['stock'])& isset($_POST['dateinscrite']))
        {
            $login=$_SESSION['loginAdmin'];
            echo $login;
            if (is_uploaded_file($_FILES['photo']['tmp_name'])) 
            {
                $image = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
                insertBD($_POST['reference'],$_POST['categorie'],$_POST['titre'], $_POST['description'], $_POST['couleur'], $_POST['taille'],$_POST['public'],$image,$_POST['prix'],$_POST['stock'],$_POST['dateinscrite'], $login);
                echo "vous avez ajouté une produit";
                header('Location:admin.php');
                exit();
            }
            
    
        }
        else
        {
            //echo "Aucune donnée recue ";
        }
        function insertBD($reference,$categorie,$titre,$description,$couleur,$taille,$public,$photo,$prix,$stock,$date,$login){
            try
            {
                $connect=mysqli_connect('localhost','root','','ecommercebd');
                echo "connexion réussie <br>";
                mysqli_query($connect,"INSERT INTO PRODUITS(reference,categorie,titre,description,couleur,taille,public,photo,prix,stock,dateinscrite,login) values('$reference','$categorie','$titre','$description','$couleur','$taille','$public','$photo','$prix','$stock','$date','$login')");

            }
            catch(Exception $e)
            {
                echo "il n'y a une erreur dans le code de ma connexion <br>";
            }
        } 
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>