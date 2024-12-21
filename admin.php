<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script>
        function confirmSuppression() {
            return confirm("Êtes-vous sûr de vouloir supprimer ce produit ?");
        }
        function confirmSuppr() {
            return confirm("Êtes-vous sûr de vouloir supprimer ce membre ?");
        }
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Admin-Page</title>
</head>
<body>
    <div class="container mt-3">
            <div class=" d-flex justify-content-between">  
                <p >Ajouter un produit :</p>
                <form action="" method="get" class="d-flex">
                    <input type="text" class="form-control me-2" placeholder="search" name="searchrect">
                    <button class="btn btn-outline-info" name="btnrech">search</button>
                </form> 
            <form action="" method="get">
                    <button name="choix" class="btn btn-outline-primary" value="ajout">Ajouter</button>
            </form> 
            </div>
            <?php
            ob_start();
            try
            {
                $connect=mysqli_connect('localhost','root','','ecommercebd');
                echo "connexion réussie <br>";
                $result=10;
                $search = isset($_GET['searchrect']) ? $_GET['searchrect'] : '';
                $search_query = $search ? "WHERE titre LIKE '%$search%'" : '';
                $req=mysqli_query($connect,"SELECT COUNT(*) AS total FROM PRODUITS $search_query ");
                $rows=mysqli_fetch_assoc($req);
                $total_pages = ceil($rows['total'] / $result);

                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $page_actuel = ($page - 1) * $result;

                $requete=mysqli_query($connect,"SELECT * FROM PRODUITS $search_query LIMIT $page_actuel,$result");
                echo '<table class="table table-bordered table-hover">';
                echo '<thead class="table-info">';
                echo '<td>NUMERO</td>';
                echo '<td>REFERENCE</td>';
                echo '<td>TITRE</td>';
                echo '<td>PHOTO</td>';
                echo '<td>COUT</td>';
                echo '<td>DATE INSCRITE</td>';
                echo '<td>MODIFICATION</td>';
                echo '<td>SUPPRESSION</td>';
                echo '<td>Details</td>';
                echo '</thead>';
                echo '<tbody>';
                if(mysqli_num_rows($requete)>0){
                    while($row=mysqli_fetch_assoc($requete))
                    {
                        echo'<tr>'; 
                        echo'<td>'.$row["id_produit"].'</td>';
                        echo'<td>'.$row["reference"].'</td>';
                        echo'<td>'.$row["titre"].'</td>';
                        echo'<td><img class="para" src="data:image/jpeg;base64,'.base64_encode($row["photo"]).'"></td>';
                        echo'<td>'.$row["prix"].'</td>';
                        echo'<td>'.$row["dateinscrite"].'</td>';
                        echo'<td><form action="modifpro.php" method="get"><button name="id_produit" class="btn btn-outline-success" value="'.$row["id_produit"].'">Modifier</button></form></td>';
                        echo'<td><form action="" method="post" onsubmit="return confirmSuppression();"><input type="hidden" name="id_produit" value="'.$row["id_produit"].'"><button name="choix" class="btn btn-outline-danger" value="supprimer">Supprimer</button></form></td>';
                        echo'<td><form action="detail.php" method="get"><button class="btn btn-outline-info" name="id_produit" value="'.$row["id_produit"].'">Details</button></form></td>';
                        echo'</tr>';
                        
                    }
                }
                echo '</tbody>';
                echo '</table>'; 
                echo'<div>';
                echo'<nav aria-label="Page navigation example">';
                echo'<ul class="pagination">';
                for ($i = 1; $i <= $total_pages; $i++) 
                { 
                    echo'<li class="page-item">'; 
                    echo'<a class="page-link" href="admin.php?page='.$i.'">'.$i.'</a>';
                    echo'</li>';
                }
                echo'</nav>';
                echo'</div>';
            }
            catch(Exception $e)
            {
                echo "il n'y a une erreur dans le code de ma connexion";
            }
            
        ?>
        <?php
                if (isset($_POST['choix']) && $_POST['choix'] == 'supprimer') {
                    $id_produit = $_POST['id_produit'];
                    deleteBD($id_produit);
                    echo 'Recette supprimée avec succès';
                    header('Location: admin.php');
                    exit();
                }
             if(isset($_GET['choix']))
             {
                 switch($_GET['choix'])
                 {
                     case 'ajout':
                         header('Location:ajoutpro.php');
                     break;
                     case 'ajoutmembre':
                         header('Location:ajout.php');
                     break;
                 }
     
             }
             function deleteBD($id_produit) {
                try {
                    $connect = mysqli_connect('localhost', 'root', '', 'ecommercebd');
                    echo "connexion réussie <br>";
                    mysqli_query($connect, "DELETE FROM PRODUITS WHERE id_produit=$id_produit");
                } catch (Exception $e) {
                    echo "il y a une erreur dans le code de ma connexion";
                }
            }
        ?>
         <div class=" d-flex justify-content-between">  
            <p >Ajouter un membre : </p>
            <form action="" method="get" class="d-flex ">
                <input type="text" class="form-control me-2" placeholder="search" name="searchmemb">
                <button class="btn btn-outline-info" name="btnmemb">search</button>
            </form> 
            <form action="" method="get">
                <button name="choix" class="btn btn-outline-primary" value="ajoutmembre">Ajouter</button>
            </form> 
        </div>
        <?php
        try
        {
            $connect=mysqli_connect('localhost','root','','ecommercebd');
            echo "connexion réussie <br>";
            $results=10;
            $searchs = isset($_GET['searchmemb']) ? $_GET['searchmemb'] : '';
            $searchs_query = $searchs ? "WHERE nom LIKE '%$searchs%'" : '';
            $reqs=mysqli_query($connect,'SELECT COUNT(*) AS total FROM MEMBRES');
            $rows=mysqli_fetch_assoc($reqs);
            $total_page = ceil($rows['total'] / $results);

            $pages = isset($_GET['page']) ? $_GET['page'] : 1;
            $page_actuels = ($pages - 1) * $results;

            $request=mysqli_query($connect,"SELECT * FROM MEMBRES $searchs_query LIMIT $page_actuels,$results");
            echo '<table class="table table-bordered table-hover">';
            echo '<thead class="table-info">';
            echo '<td>NUMERO</td>';
            echo '<td>NOM</td>';
            echo '<td>PRENOM</td>';
            echo '<td>TELEPHONE</td>';
            echo '<td>LOGIN</td>';
            echo '<td>MODIFICATION</td>';
            echo '<td>SUPPRESSION</td>';
            echo '</thead>';
            echo '<tbody>';
            if(mysqli_num_rows($request)>0){
                while($row=mysqli_fetch_assoc($request))
                {
                    echo'<tr>'; 
                    echo'<td>'.$row["idmembre"].'</td>';
                    echo'<td>'.$row["nom"].'</td>';
                    echo'<td>'.$row["prenom"].'</td>';
                    echo'<td>'.$row["telephone"].'</td>';
                    echo'<td>'.$row["login"].'</td>';
                    echo'<td><form action="modif.php" method="get"><button name="idmembre" class="btn btn-outline-success" value="'.$row["idmembre"].'" type="submit">Modifier</button></form></td>';
                    echo'<td><form action="" method="post" onsubmit="return confirmSuppr();"><input type="hidden" name="idmembre" value="'.$row["idmembre"].'"><button name="choix" class="btn btn-outline-danger" value="supprime">Supprimer</button></form></td>';
                    echo'</tr>';
                      
                }
            }
           echo '</tbody>';
           echo '</table>'; 
           echo'<div>';
           echo'<nav aria-label="Page navigation example">';
            echo'<ul class="pagination">';
            for ($i = 1; $i <= $total_page; $i++) 
            { 
                echo'<li class="page-item">'; 
                echo'<a class="page-link" href="admin.php?page='.$i.'">'.$i.'</a>';
                echo'</li>';
            }
            echo'</nav>';
           echo'</div>';
        }
        catch(Exception $e)
        {
            echo "il n'y a une erreur dans le code de ma connexion";
        }
        ?>
         <?php
        if (isset($_POST['choix']) && $_POST['choix'] == 'supprime') {
            $idmembre = $_POST['idmembre'];
            deleteBDD($idmembre);
            echo 'Membre supprimé avec succès';
            header('Location: admin.php');
            exit();
        }
        function deleteBDD($idmembre) {
            try {
                $connect = mysqli_connect('localhost', 'root', '', 'ecommercebd');
                echo "connexion réussie <br>";
                mysqli_query($connect, "DELETE FROM MEMBRES WHERE idmembre='$idmembre'");
            } catch (Exception $e) {
                echo "il y a une erreur dans le code de ma connexion";
            }
        }
        ob_end_flush();
    ?>
    </div>
</body>
</html>