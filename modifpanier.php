<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail-page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
<?php
    session_start();
    include('fonction.php');
    if(isset($_GET['id_produit']))
    {
        $connect=mysqli_connect('localhost','root','','ecommercebd');
        echo "connexion réussie <br>";
        $requete=mysqli_query($connect,"SELECT * FROM produits WHERE id_produit='$_GET[id_produit]'");
    
        ?>

        <div class="Boutique container m-4">
            <?php while($produit=$requete->fetch_assoc()):?>
                <h3><?=htmlspecialchars($produit['titre']) ?></h3>
                <div class="card image-wrapper mb-2 shadow" style="width: 15rem;">
                    <?php
                    echo'<img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode($produit["photo"]).'" height="200" alt='.htmlspecialchars($produit["titre"]).'>';   
                    ?>
                    <div class="card-body">
                      <p class="card-text mb-1 fw-bold"><?=$produit['description']?></p>
                      <p class="card-text mb-1"><?=$produit['couleur']?></p>
                      <p class="card-text mb-1"><?=$produit['reference']?></p>
                      <p class="card-text mb-1"><?=htmlspecialchars($produit['prix']) ?>$</p>
                      <p class="card-text mb-1"><?=$produit['categorie']?></p>
                      <p class="card-text mb-1"><?=$produit['taille']?></p>
                    </div>
                </div>
           
        <?php

        if($produit['stock']>0)
        {
            echo"Quantite de stock du produit : ".$produit['stock']."<br>";
            echo '<form action="panier.php" method="post">';
            echo"<input type='hidden' name='hidden_produit' value='$produit[id_produit]'>";
            echo '<label for="quantite">Choisissez la quantite que vous souhaiter commander</label>
            <select name="quantite" id="quantite">';
            for($i=1;$i<=$produit['stock']&&$i<=5;$i++)
            {
                echo" <option>$i</option>";
            }
            echo '</select><br>';
            echo "<input type='submit' class='btn btn-outline-success' value='modifier' name='modifier_panier'>";
            echo '</form>';
            echo'<br>';
        }
        else
        {
            echo"Ruprture de stock";
        }
         endwhile;
    }
    
?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
