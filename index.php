<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    .welcome-section {
      background-color: #f8f9fa;
      padding: 50px 0;
      text-align: center;
    }
    .featured-products {
      padding: 50px 0;
    }
    .testimonial-section {
      background-color: #e9ecef;
      padding: 50px 0;
    }
    .contact-section {
      padding: 50px 0;
    }
  </style>
  <title>Index-Page</title>
</head>
<body>
  <header>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="index.php" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Connexion
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="login.php">Login</a></li>
            <li><a class="dropdown-item" href="register.php">Register</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
  </header>
  
  <div class="container-fluid mt-3">
  <section class="welcome-section">
      <div class="container">
        <h1>Bienvenue sur notre site e-commerce</h1>
        <p>Découvrez nos produits de qualité et nos offres exceptionnelles.</p>
      </div>
    </section>
    <section class="featured-products">
      <div class="container">
        <h2>Produits en Vedette</h2>
        <div class="row">
          <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card">
              <img src="produits/sachnoir.jpg" class="card-img-top" alt="Product Image">
              <div class="card-body">
                <h5 class="card-title">Sac à dos noir homme</h5>
                <p class="card-text">Description du produit.</p>
                <p class="fw-bold">Prix: 98$</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card">
              <img src="produits/saceastpak.jpg" class="card-img-top" alt="Product Image">
              <div class="card-body">
                <h5 class="card-title">Sac à dos Eastpak</h5>
                <p class="card-text">Description du produit.</p>
                <p class="fw-bold">Prix: 120$</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card">
              <img src="produits/sacfcuir.jpg" class="card-img-top" alt="Product Image">
              <div class="card-body">
                <h5 class="card-title">Sac à dos Hugo </h5>
                <p class="card-text">Description du produit.</p>
                <p class="fw-bold">Prix: 123$</p>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card">
              <img src="produits/goyardblanc.jpg" class="card-img-top" alt="Product Image">
              <div class="card-body">
                <h5 class="card-title">Sac Goyard</h5>
                <p class="card-text">Description du produit.</p>
                <p class="fw-bold">Prix: 12000$</p>
              </div>
            </div>
          </div>
          <!-- Repeat for more products -->
        </div>
      </div>
    </section>
  <?php
        
        ob_start();
         try
         {
             $connect=mysqli_connect('localhost','root','','ecommercebd');
             echo "connexion réussie <br>";
             

             $requete=mysqli_query($connect,"SELECT * FROM PRODUITS");
             echo '<div class="row row-cols-lg-4">';
             
             if(mysqli_num_rows($requete)>0){
                 while($row=mysqli_fetch_assoc($requete))
                 {
                    echo'<div class="card image-wrapper  my-3 mx-4  shadow" style="width: 17rem;">';
                    echo'<img class=" card-img-top" src="data:image/jpeg;base64,'.base64_encode($row["photo"]).'">';
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
         }
         catch(Exception $e)
         {
             echo "il n'y a une erreur dans le code de ma connexion";
         }
        ob_end_flush();
    ?>
    
    <section class="testimonial-section">
      <div class="container">
        <h2>Témoignages</h2>
        <div class="row">
          <div class="col-md-4">
            <blockquote class="blockquote">
              <p class="mb-0">Produit incroyable! Je suis très satisfait.</p>
              <footer class="blockquote-footer">Client 1</footer>
            </blockquote>
          </div>
        </div>
      </div>
    </section>
    <section class="contact-section">
      <div class="container">
        <h2>Contactez-nous</h2>
        <form>
          <div class="mb-3">
            <label for="name" class="form-label">Nom</label>
            <input type="text" class="form-control" id="name" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" required>
          </div>
          <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea class="form-control" id="message" rows="3" required></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>
      </div>
    </section>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
