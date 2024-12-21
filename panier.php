<?php
    session_start();
    include('fonction.php');
    if(isset($_POST['ajouter_panier']))
    {
        $connect=mysqli_connect('localhost','root','','ecommercebd');
        echo "connexion réussie <br>";
        $requete=mysqli_query($connect,"SELECT * FROM produits WHERE id_produit='$_POST[hidden_produit]'");

        $produit=mysqli_fetch_assoc($requete);
        ajouterProduitDansPanier($produit['titre'],$produit['id_produit'],$_POST['quantite'],$produit['prix']);
        //echo"<a href='index.php'> Voulez vous ajouter d'autres produits ?</a>";
        header('Location:detail.php');
    }
    if(isset($_GET['id_produit_supprimer'])){
        $idproduit=$_GET['id_produit_supprimer'];
        retirerproduitDuPanier($idproduit);
        header('Location:detail.php');
    }

    if (isset($_POST['modifier_panier'])) {
        $id_produit = $_POST['hidden_produit'];
        $quantite = $_POST['quantite'];
        modifierproduitDuPanier($id_produit, $quantite);
        header("Location: detail.php");
        exit();
    }

    if(isset($_GET['action']) && $_GET['action'] == 'vider'){
        viderPanier();
        header("Location: detail.php");
        exit();
    }
?>

