<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Product-Page</title>
</head>
<body>
<div class="container-fluid m-2">
    <?php
    $produits = [ 
        ['id' => 1, 'nom' => 'Ordinateur portable','categorie' => 'Informatique', 'prix' => 750.99, 'stock' => 5],
        ['id' => 2, 'nom' => 'Imprimante', 'categorie' => 'Informatique','prix' => 150.50, 'stock' => 10],
        ['id' => 3, 'nom' => 'Chaise','categorie' => 'Mobilier', 'prix' => 45.99, 'stock' => 25],
        ['id'=> 4, 'nom' => 'Bureau', 'categorie' => 'Mobilier', 'prix' =>120.75, 'stock' => 8],
        ['id' => 5, 'nom' => 'Télévision','categorie' => 'Électronique', 'prix' => 499.99, 'stock' => 3],
        ['id' => 6, 'nom' => 'Samsung S24','categorie' => 'Téléphone', 'prix' => 1499.99, 'stock' => 13],
        ['id' => 7, 'nom' => 'Samsung S23','categorie' => 'Téléphone', 'prix' => 1099.99, 'stock' => 2],
    ];
    if(isset($_POST['nom'])&&isset($_POST['categorie'])&&isset($_POST['prix'])&&isset($_POST['stock']))
    {
                $nouveau_produit= [ 
                    'id' => count($produits) + 1, 
                    'nom' => $_POST['nom'], 
                    'categorie' => $_POST['categorie'], 
                    'prix' => $_POST['prix'], 
                    'stock' => $_POST['stock'] 
                ]; 
                $produits[] = $nouveau_produit;
    }
    

    echo '<table class="table table-hover table-bordered" >';
    echo '<thead class="table-info">';
    echo '<th>Nom du produit</th>';
    echo '<th>Catégorie</th>';
    echo '<th>Prix</th>';
    echo '<th>Stock</th>';
    echo '</thead>';
    echo '<tbody>';
    foreach($produits as $key=>$ligne){
        echo '<tr>';
        echo "<td>{$ligne['nom']}</td>";
        echo "<td>{$ligne['categorie']}</td>";
        echo "<td>{$ligne['prix']}</td>";
        echo "<td>{$ligne['stock']}</td>";
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
?>
<form action="" method="post">
    <label for="nom">Nom du produit</label>
    <input type="text" name="nom" placeholder="Nom du produit" required><br><br>
    <label for="categorie">Catégorie</label>
    <input type="text" name="categorie" placeholder="categorie" required><br><br>
    <label for="prix">Prix</label>
    <input type="text" name="prix" placeholder="prix" required><br><br>
    <label for="stock">Stock</label>
    <input type="text" name="stock" placeholder="stock"required><br><br>
    <button type="submit" class="btn btn-outline-success">Ajouter</button>
</form>
    <?php

        $prixTotal = 0;
        $nbreTotalProduit = count($produits);
        foreach ($produits as $key=>$ligne) {
            $prixTotal += $ligne['prix'];
        }
        $prixMoyen = $prixTotal / $nbreTotalProduit;


        $stockTotal = 0;
        foreach ($produits as $key=>$ligne) {
            $stockTotal += $ligne['stock'];
        }
    ?>
    <br><br>
    <h2 class="text-info">Statistiques</h2>
    <p>Prix moyen des produits : <?php echo $prixMoyen; ?> €</p>
    <p>Nombre total de produits en stock : <?php echo $stockTotal; ?></p>
</div>
</body>
</html>
