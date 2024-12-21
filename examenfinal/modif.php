<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Modify-Page</title>
</head>
<body>
    <div class="container mt-3">
        <?php
            try {
                if (isset($_GET['idconcert'])) {
                    $idconcert = $_GET['idconcert'];
                    $connect = mysqli_connect('localhost', 'root', '', 'concerts_db');
                    echo "connexion réussie <br>";
                    $requete = mysqli_query($connect, "SELECT * FROM concerts WHERE id=$idconcert");
                    if (mysqli_num_rows($requete) > 0) {
                        while ($row = mysqli_fetch_assoc($requete)) {
                            echo '<form action="" method="post" enctype="multipart/form-data">';
                            echo '<h2>Modification du concert</h2>';
                            echo '<input type="hidden" name="idconcert" value="' . $idconcert . '">';
                            echo '<label for="nom">Nom artiste</label>';
                            echo '<input type="text" name="nom" placeholder="Nom artiste" value="' . $row["nom_artiste"] . '" required><br><br>';
                            echo '<label for="date">Date concert</label>';
                            echo '<input type="date" name="date" placeholder="Catégorie" required value="' . $row["date_concert"] . '"><br><br>';
                            echo '<label for="lieu">lieu</label>';
                            echo '<input type="text" name="lieu" placeholder="56.00" value="' . $row["lieu"] . '"  required><br><br>';
                            echo '<label for="nbreplace">nbreplace</label>';
                            echo '<input type="text" name="nbreplace" placeholder="nbreplace" value="' . $row["places_disponibles"] . '" required ><br><br>';
                            echo '<button type="submit" class="btn btn-outline-success" name="submit">Modifier</button>';
                            echo '</form>';
                        }
                    }
                }
            } catch (Exception $e) {
                echo "il y a une erreur dans le code de ma connexion";
            }


            if (isset($_POST['submit'])) {
                $idconcert = $_POST['idconcert'];
                updateBD($_POST['nom'], $_POST['date'], $_POST['lieu'], $_POST['nbreplace'],$idconcert);
                echo "vous avez modifié un concert";
                header('Location:index.php');
                exit();
            }

            function updateBD($nom, $date, $lieu, $nbreplace, $idconcert) {
                try {
                    $connect = mysqli_connect('localhost', 'root', '', 'concerts_db');
                    echo "connexion réussie <br>";
                    mysqli_query($connect, "UPDATE concerts SET nom_artiste='$nom', date_concert='$date', lieu='$lieu', places_disponibles='$nbreplace' WHERE id=$idconcert");
                } catch (Exception $e) {
                    echo "il n'y a une erreur dans le code de ma connexion <br>";
                }
            }
        ?>
    </div>
</body>
</html>