<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Login-Page</title>
</head>
<body>
<div class="container">
    <div class="form-wrapper">
        <form action="" method="POST">
            <h1>Membre</h1>
            <label for="login">Last Name</label>
            <input type="text" name="loginmemb" placeholder="login"><br><br>
            <label for="password">Password</label>
            <input type="password" name="passwordmemb" placeholder="Password"><br><br>
            <button type="submit" class="btn btn-outline-success">Entrer</button> <a href="register.php">Non membre</a>
        </form>
    </div>
    <div class="form-wrapper">
        <form action="" method="POST">
            <h1>Administrateur</h1>
            <label for="login">Last Name</label>
            <input type="text" name="loginAdmin" placeholder="login"><br><br>
            <label for="password">Password</label>
            <input type="password" name="passwordAdmin" placeholder="Password"><br><br>
            <button type="submit" class="btn btn-outline-success">Entrer</button> 
        </form>
    </div>
</div>
    <?php
        session_start();
        if(isset($_POST['loginmemb']) && isset($_POST['passwordmemb']))
        {
            $_SESSION['loginmemb']=$_POST['loginmemb'];
            $_SESSION['passwordmemb']=$_POST['passwordmemb'];
            loginBDD($_POST['loginmemb'],$_POST['passwordmemb']);

            
    
        }
        else
        {
            //echo "Aucune donnée recue <br>";
        }
        
        function loginBDD($login,$passwd){
            try
            {
                $connect=mysqli_connect('localhost','root','','ecommercebd');
                echo "connexion réussie <br>";
                $req=mysqli_query($connect,"SELECT * FROM MEMBRES WHERE login='$login' AND password='$passwd'");
                if(mysqli_num_rows($req)>0)
                {
                    echo "vous êtes connecté";
                    
                    setcookie("logincookie", $login, time() + 120, "/");
                    header('Location:membre.php');
                    exit();
                }
                else
                {
                    echo "login ou mot de passe erroné";
                    header('Location:register.php');
                    exit();
                }

            }
            catch(Exception $e)
            {
                echo "login  ou mot de passe incorrect !";
            }
        }
       
    ?>
    <?php
        if(isset($_POST['loginAdmin']) && isset($_POST['passwordAdmin']))
        {
            $_SESSION['loginAdmin']=$_POST['loginAdmin'];
            $_SESSION['passwordAdmin']=$_POST['passwordAdmin'];
            loginBD($_POST['loginAdmin'],$_POST['passwordAdmin']);

            
    
        }
        else
        {
           // echo "Aucune donnée recue ";
        }
        
        function loginBD($login,$passwd){
            try
            {
                $connect=mysqli_connect('localhost','root','','ecommercebd');
                echo "connexion réussie <br>";
                $req=mysqli_query($connect,"SELECT * FROM ADMIN WHERE login='$login' AND password='$passwd'");
                if(mysqli_num_rows($req)>0)
                {
                    echo "vous êtes connecté";
                    header('Location:admin.php');
                    exit();
                }
                else
                {
                    echo "login ou mot de passe erroné";
                    header('Location:register.php');
                    exit();
                }

            }
            catch(Exception $e)
            {
                echo "login  ou mot de passe incorrect !";
            }
        }
    
    ?>
</body>
</html>