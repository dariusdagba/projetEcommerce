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
            echo "<input type='submit' class='btn btn-outline-success' value='ajouter au panier' name='ajouter_panier'>";
            echo '</form>';
            echo'<br>';
        }
        else
        {
            echo"Ruprture de stock";
        }
         endwhile;
    }
    echo"<a href='admin.php'> Voulez vous ajouter d'autres produits ?</a>";
    echo"<br>";
    echo "<div class='container-fluid mt-2'> ";
    echo "<table border='1' class='table table-bordered table-hover' style='border-collapse: collapse' cellpadding='7'>";
    echo "<thead class='table-info text-center fw-bold'><td colspan='6'>Panier</td></thead>";
    echo "<thead class='table-primary'>
            <th>Titre</th>
            <th>Produit</th>
            <th>Quantité</th>
            <th>Prix Unitaire</th>
            <th>Supprimer</th>
            <th>Modifier</th>
            </thead>";
if(empty($_SESSION['panier']['id_produit'])) // panier vide
{
    echo "<tr><td colspan='5'>Votre panier est vide</td></tr>";
}
else
{
    for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++) 
    {
        $idprod=$_SESSION['panier']['id_produit'][$i];
       
    echo "<tr>";
    echo "<td>" . $_SESSION['panier']['titre'][$i] . "</td>";
    echo "<td>" . $_SESSION['panier']['id_produit'][$i] . "</td>";
    echo "<td>" . $_SESSION['panier']['quantite'][$i] . "</td>";
    echo "<td>" . $_SESSION['panier']['prix'][$i] . "</td>";
    echo"<td> <a href='panier.php?id_produit_supprimer=$idprod'>
            <input type='button' class='btn btn-outline-danger' value='supprimer'>
        </a></td>";
    echo'<td><form action="modifpanier.php" method="get"><button name="id_produit" class="btn btn-outline-success" value="'.$idprod.'">Modifier</button></form></td>';
    echo "</tr>";
    }
    echo "<tr><th colspan='3'>Total</th><td colspan='3'>" . montantTotal() . " CAD</td></tr>";
    if(true) 
    {
    echo '<form method="post" action="">';
    echo '<tr><td colspan="6"><input type="submit" class="btn btn-outline-primary" name="payer" value="Valider et déclarer le paiement" /></td></tr>';
    echo '</form>';
    }
    else 
    {
    echo '<tr><td colspan="3">Veuillez vous <a href="inscription.php">inscrire</a> ou vous <a href="connexion.php">connecter</a> afin de pouvoir payer</td></tr>';
    }
    echo "<tr><td colspan='6'><a href='panier.php?action=vider'>Vider mon panier</a></td></tr>";
}
echo "</table><br />";
echo "<i>Réglement par CHÈQUE uniquement à l'adresse suivante : 3030 rue Hochelaga</i><br />";
echo "</div>";
?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
