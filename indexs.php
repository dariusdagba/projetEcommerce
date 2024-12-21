<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <title>Index-Page</title>
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
</head>
<body>
  <header>
    <!-- Navbar code here -->
  </header>

  <div class="container-fluid mt-3">
    <!-- PHP code here -->

    <!-- Welcome Section -->
    <section class="welcome-section">
      <div class="container">
        <h1>Bienvenue sur notre site e-commerce</h1>
        <p>Découvrez nos produits de qualité et nos offres exceptionnelles.</p>
      </div>
    </section>

    <!-- Featured Products Section -->
    <section class="featured-products">
      <div class="container">
        <h2>Produits en Vedette</h2>
        <div class="row">
          <!-- Example product card -->
          <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card">
              <img src="path/to/image.jpg" class="card-img-top" alt="Product Image">
              <div class="card-body">
                <h5 class="card-title">Produit 1</h5>
                <p class="card-text">Description du produit 1.</p>
                <p class="fw-bold">Prix: 20$</p>
              </div>
            </div>
          </div>
          <!-- Repeat for more products -->
        </div>
      </div>
    </section>

    <!-- Testimonial Section -->
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
          <!-- Repeat for more testimonials -->
        </div>
      </div>
    </section>

    <!-- Contact Section -->
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
