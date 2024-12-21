<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Reservation-Page</title>
</head>
<body>
    <div class="container mt-3">
    <form action="" method="post">
        <label for="nom">Nom artiste</label>
        <input type="text" name="nom" placeholder="Nom artiste" required><br><br>
        <label for="date">Catégorie</label>
        <input type="date" name="date" required ><br><br>
        <label for="lieu">Lieu</label>
        <input type="text" name="lieu" placeholder="lieu" required><br><br>
        <label for="nbreplace">Nombres de places</label>
        <input type="text" name="nbreplace" placeholder="1" required><br><br>
        <button type="submit" class="btn btn-outline-success">Réserver</button>
    </form>

<?php
    if(isset($_POST['nom'])&& isset($_POST['date'])&& isset($_POST['lieu'])&& isset($_POST['nbreplace'])){
        insertBD($_POST['nom'],$_POST['date'],$_POST['lieu'], $_POST['nbreplace']);
        echo "vous avez reservé un concert";
        header('Location:index.php');
        exit();

    }
    else
    {
        echo "Aucune donnée recue ";
    }
    function insertBD($nom,$date,$lieu,$nbreplaces){
        try
        {
            $connect=mysqli_connect('localhost','root','','concerts_db');
            echo "connexion réussie <br>";
            mysqli_query($connect,"INSERT INTO concerts(nom_artiste,date_concert,lieu,places_disponibles) values('$nom','$date','$lieu','$nbreplaces')");

        }
        catch(Exception $e)
        {
            echo "il n'y a une erreur dans le code de ma connexion <br>";
        }
    }  
?>
</div>
</body>
</html>