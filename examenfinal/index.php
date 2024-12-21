<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Index-Page</title>
</head>
<body>
    <div class="container mt-3">
        <div class=" d-flex justify-content-between">  
            <p >Ajouter un concert :</p>
            <form action="" method="get">
                    <button name="choix" class="btn btn-outline-primary" value="ajout">Ajouter</button>
            </form> 
        </div>
    <?php
         try
         {
            $connect=mysqli_connect('localhost','root','','concerts_db');
            echo "connexion réussie <br>";
            $requete = mysqli_query($connect, "SELECT * FROM concerts");
            echo '<table class="table table-bordered table-hover">';
            echo '<thead class="table-info">';
            echo '<td>NUMERO</td>';
             echo "<td>Nom de l'artiste</td>";
             echo '<td>Date du concert</td>';
             echo '<td>lieu </td>';
             echo '<td>Place disponible</td>';
             echo '<td>Modifier</td>';
             echo '</thead>';
             echo '<tbody>';
             if(mysqli_num_rows($requete)>0){
                while($row=mysqli_fetch_assoc($requete))
                {
                     echo'<tr>'; 
                     echo'<td>'.$row["id"].'</td>';
                     echo'<td>'.$row["nom_artiste"].'</td>';
                     echo'<td>'.$row["date_concert"].'</td>';
                     echo'<td>'.$row["lieu"].'</td>';
                     echo'<td>'.$row["places_disponibles"].'</td>';
                     echo'<td><form action="modif.php" method="get"><button name="idconcert" class="btn btn-outline-success" value="'.$row["id"].'" type="submit">Modifier</button></form></td>';
                     echo'</tr>'; 
                }
            }
            echo '</tbody>';
            echo '</table>'; 
            echo'<div>';
         }
         catch(Exception $e)
         {
             echo "il n'y a une erreur dans le code de ma connexion";
         }

         if(isset($_GET['choix']))
             {
                 switch($_GET['choix'])
                 {
                     case 'ajout':
                         header('Location:reservation.php');
                     break;
                 }
     
             }
    ?>
    </div>
</body>
</html>