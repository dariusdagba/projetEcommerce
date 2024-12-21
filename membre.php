<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script>
        function confirmSuppression() {
            return confirm("Êtes-vous sûr de vouloir supprimer cette recette ?");
        }
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Member-Page</title>
</head>
<body>
    <div class="container-fluid mt-3">
        <div class=" d-flex justify-content-between">  
            <p >Ajouter au panier :</p>
            <form action="" method="get" class="d-flex">
                    <input type="text" class="form-control me-2" placeholder="search" name="searchrect">
                    <button class="btn btn-outline-primary" name="btnrech">search</button>
            </form>
           <form action="" method="get">
           <p>
            <?php
                session_start();
                echo "Bienvenue : ".$_SESSION['loginmemb']
                ?>
            </p>
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
             $req=mysqli_query($connect,"SELECT COUNT(*) AS total FROM PRODUITS $search_query");
             $rows=mysqli_fetch_assoc($req);
             $total_pages = ceil($rows['total'] / $result);

             $page = isset($_GET['page']) ? $_GET['page'] : 1;
             $page_actuel = ($page - 1) * $result;

             $requete=mysqli_query($connect,"SELECT * FROM PRODUITS $search_query LIMIT $page_actuel,$result");
             echo '<div class="row row-cols-lg-4">';
             
             if(mysqli_num_rows($requete)>0){
                 while($row=mysqli_fetch_assoc($requete))
                 {
                    echo'<div class="card image-wrapper  my-3 mx-4  shadow" style="width: 17rem;">';
                    // if(isset($_COOKIE["logincookie"])) 
                    // { 
                    //     echo "<a href='details.php?id_produit=".$row["id_produit"]."'>"; 
                    //     echo '<img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode($row["photo"]).'">'; 
                    //     echo '</a>'; 
                    // } else 
                    // { 
                    //     header('Location:login.php');
                    //      exit(); 
                    // }
                    echo "<a href='details.php?id_produit=".$row["id_produit"]."'>"; 
                    echo '<img class="card-img-top" src="data:image/jpeg;base64,'.base64_encode($row["photo"]).'">'; 
                    echo '</a>'; 
                    echo'<div class="card-body">';
                    echo'<p class="fw-bold card-text mb-1">'.$row["titre"].'</p>';
                    echo'<p class="text-secondary mb-1">'.$row["description"].'</p>';
                    echo'<p class="text-secondary mb-1" >'.$row["couleur"].'</p>';
                    echo '<p class="fw-bold mb-1" >'.$row ["prix"].'$ </p>';
                    echo"</div>";
                    echo"</div>";
                       
                 }
             }
            echo '</div>'; 
            echo'<div>';
            echo'<nav aria-label="Page navigation example">';
            echo'<ul class="pagination">';
            for ($i = 1; $i <= $total_pages; $i++) 
            { 
                echo'<li class="page-item">'; 
                echo'<a class="page-link" href="membre.php?page='.$i.'">'.$i.'</a>';
                echo'</li>';
            }
            echo'</nav>';
            echo'</div>';
         }
         catch(Exception $e)
         {
             echo "il n'y a une erreur dans le code de ma connexion";
         }
        
        ob_end_flush();
    ?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>