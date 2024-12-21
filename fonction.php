<?php

    function creationDuPanier()
    {
       if (!isset($_SESSION['panier']))
       {
          $_SESSION['panier']=array();
          $_SESSION['panier']['titre'] = array();
          $_SESSION['panier']['id_produit'] = array();
          $_SESSION['panier']['quantite'] = array();
          $_SESSION['panier']['prix'] = array();
       }
    }
    function ajouterProduitDansPanier($titre,$id_produit,$quantite,$prix)
    {
        creationDuPanier();
        $position_produit = array_search($id_produit,  $_SESSION['panier']['id_produit']);
        if ($position_produit != false)
        {
            $_SESSION['panier']['quantite'][$position_produit] += $quantite ;
        }
        else
        {
            $_SESSION['panier']['titre'][] = $titre;
            $_SESSION['panier']['id_produit'][] = $id_produit;
            $_SESSION['panier']['quantite'][] = $quantite;
            $_SESSION['panier']['prix'][] = $prix;
        }
    }

    function montantTotal()
    {
        $total=0;
        for($i = 0; $i < count($_SESSION['panier']['id_produit']); $i++)
        {
            $total += $_SESSION['panier']['quantite'][$i] * $_SESSION['panier']['prix'][$i];
        }
        return round($total,2);
    }
    
    function retirerproduitDuPanier($id_produit_a_supprimer)
    {
        $position_produit = array_search($id_produit_a_supprimer,  $_SESSION['panier']['id_produit']);
        if ($position_produit !=false)
        {
            array_splice($_SESSION['panier']['titre'], $position_produit, 1);
            array_splice($_SESSION['panier']['id_produit'], $position_produit, 1);
            array_splice($_SESSION['panier']['quantite'], $position_produit, 1);
            array_splice($_SESSION['panier']['prix'], $position_produit, 1);
        }
    }

    function modifierproduitDuPanier($id_produit_a_modifier, $quantite)
    {
        $position_produit = array_search($id_produit_a_modifier, $_SESSION['panier']['id_produit']);
        if ($position_produit !== false) {
            $_SESSION['panier']['quantite'][$position_produit] = $quantite;
        }
    }

    function viderPanier(){
        unset($_SESSION['panier']);
    }
    
?>

