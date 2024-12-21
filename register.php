<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Register-Page</title>
</head>
<body>
<form action="" method="POST">
       <h1>Formulaire d'enregistrement</h1>
       <label for="nom">Last Name</label>
       <input type="text" name="nom" placeholder="Last Name" required><br><br>
       <label for="prenom">First Name</label>
       <input type="text" name="prenom" placeholder="First Name" required><br><br>
       <label for="tel">Telephone</label>
       <input type="text" name="telephone" placeholder="+ xxx-xxx-xxxx" required><br><br>
       <label for="adresse">Adresse</label>
       <input type="text" name="adresse" placeholder="Adresse" required><br><br>
       <label for="date">Date</label> 
       <input type="date" id="date" name="date"><br><br>
       <label for="login">Login</label>
       <input type="text" name="login" placeholder="login" required><br><br>
       <label for="password">Password</label>
       <input type="password" name="password" placeholder="Password" required><br><br>
       <button type="submit" class="btn btn-outline-success">Envoyer</button>
</form>
<?php
       
        if(isset($_POST['nom'])&& isset($_POST['prenom'])&& isset($_POST['date'])&& isset($_POST['login']) && isset($_POST['password'])){
            $n=$_POST['nom'][0].$_POST['nom'][1].$_POST['nom'][2];
            $p=$_POST['prenom'][0].$_POST['prenom'][1];
            $d=$_POST['date'][0].$_POST['date'][1].$_POST['date'][2].$_POST['date'][3];
            $idm=$n.$p.$d;
            insertBD($idm,$_POST['nom'],$_POST['prenom'],$_POST['telephone'], $_POST['adresse'], $_POST['date'],$_POST['login'], $_POST['password']);
            echo "vous avez créer votre compte";
            header('Location:login.php');
            exit();
    
        }
        else
        {
            echo "Aucune donnée recue ";
        }
        function insertBD($id,$nom,$prenom,$tel,$adresse,$date,$login,$passwd){
            try
            {
                $connect=mysqli_connect('localhost','root','','ecommercebd');
                echo "connexion réussie <br>";
                mysqli_query($connect,"INSERT INTO MEMBRES(idmembre,nom,prenom,telephone,adresse,datedenaissnace,login,password) values('$id','$nom','$prenom','$tel','$adresse','$date','$login','$passwd')");

            }
            catch(Exception $e)
            {
                echo "il n'y a une erreur dans le code de ma connexion <br>";
            }
        }  

?>
</body>
</html>