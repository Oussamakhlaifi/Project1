
<!doctype html>
<html lang="ar" dir="rtl">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Admin page </title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/album-rtl/">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    

<link href="/docs/5.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet" integrity="sha384-WJUUqfoMmnfkBLne5uxXj+na/c7sesSJ32gI7GfCk4zO4GthUKhSEGyvQ839BC51" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.3/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.3/assets/img/favicons/safari-pinned-tab.svg" color="#712cf9">
<link rel="icon" href="/docs/5.3/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#712cf9">
<link href="css/styles.css" rel="stylesheet" />

   
    
  </head>
  <body>
    
<header>
  <div class="collapse bg-dark" id="navbarHeader">
    <div class="container">
      <div class="row">
        <div class="col-sm-8 col-md-7 py-4">
          <h4 class="text-white">Votre produit</h4>
          <p class="text-muted">voicie votre produit si vous voulez faire des modification </p>
        </div>
        <div class="col-sm-4 offset-md-1 py-4">
          <h4 class="text-white">Tous les produits</h4>
          <ul class="list-unstyled">
            <li><a href="#boisson" class="text-white">Boisson</a></li>
            <li><a href="#sandwich" class="text-white">sanduitchs </a></li>
            <li><a href="#plats" class="text-white">plats</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="#" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="me-2" viewBox="0 0 24 24"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
        <strong>Administration</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="تبديل التنقل">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">Nos produits</h1>
        <p class="lead text-muted">voicie nos produits si vous voulez faire des modification</p>
        <p>
          <a href="ajouter_jus.php" class="btn btn-primary my-2">Ajouter un jus</a>
          <a href="ajouter_plats.php" class="btn btn-secondary my-2">ajouter un plat</a>
          <a href="ajouter_sanduitch.php" class="btn btn-danger my-2">ajouter un sanduitch</a>
        </p>
      </div>
    </div>
  </section>
 
   <!-- Section-plats-->
    <h1 class="display-1" style="text-align:center;">plats</h2>
    <section class="py-5" id="plats">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
        <?php
        include('connect.php');

$result = mysqli_query($conn, "SELECT * FROM plats");

while($row = mysqli_fetch_array($result)){
    echo '
        <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
            <div class="card h-100">
                <!-- Product image-->
                <img src="'.$row['image'].'" class="card-img-top" name="product_image" height="200px">
                <!-- Product details-->
                <div class="card-body p-4">
                    <div class="text-center">
                        <!-- Product name-->
                        <h5 class="fw-bolder" name="product_name">'.$row['name'].'</h5>
                        <!-- Product price-->
                        <div name="product_price">'.$row['price'].'</div>
                    </div>
                    <form method="POST" action="">
                        <input type="hidden" name="product_name" value="'.$row['name'].'">
                        <input type="hidden" name="product_price" value="'.$row['price'].'">
                        <input type="hidden" name="product_image" value="'.$row['image'].'">
                        <a href="deleteplats.php?id='.$row['id'].'" class="btn btn-danger">supprimer </a>
                        <a href="updateplats.php?id='.$row['id'].'" class="btn btn-primary">Modifier le produit</a>
                    </form>
                </div>
            </div>
        </div>
    ';
}
?>

        </div>
    </div>
</section>
      

                         <!-- Section-sandwich--> 
                         <h1 class="display-1" style="text-align:center;">sandwich</h2>
                       <section class="py-5"id="sandwich" >
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
        <?php
        include('connect.php');

$result = mysqli_query($conn, "SELECT * FROM sanduitch");

while($row = mysqli_fetch_array($result)){
    echo '
        <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
            <div class="card h-100">
                <!-- Product image-->
                <img src="'.$row['image'].'" class="card-img-top" name="product_image" height="200px">
                <!-- Product details-->
                <div class="card-body p-4">
                    <div class="text-center">
                        <!-- Product name-->
                        <h5 class="fw-bolder" name="product_name">'.$row['name'].'</h5>
                        <!-- Product price-->
                        <div name="product_price">'.$row['price'].'</div>
                    </div>
                    <form method="POST" action="">
                        <input type="hidden" name="product_name" value="'.$row['name'].'">
                        <input type="hidden" name="product_price" value="'.$row['price'].'">
                        <input type="hidden" name="product_image" value="'.$row['image'].'">
                        <a href="delete.php?id='.$row['id'].'" class="btn btn-danger">supprimer</a>
                        <a href="update.php?id='.$row['id'].'" class="btn btn-primary">Modifier le produit</a>
                    </form>
                </div>
            </div>
        </div>
    ';
}
?>

        </div>
    </div>
</section>
  <!-- Section-boisson-->
   
   <h1 class="display-1" style="text-align:center;">Boisson</h2>
                       <section class="py-5" id="boisson">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
        <?php
        include('connect.php');

$result = mysqli_query($conn, "SELECT * FROM jus");

while($row = mysqli_fetch_array($result)){
    echo '
        <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
            <div class="card h-100">
                <!-- Product image-->
                <img src="'.$row['image'].'" class="card-img-top" name="product_image" height="200px">
                <!-- Product details-->
                <div class="card-body p-4">
                    <div class="text-center">
                        <!-- Product name-->
                        <h5 class="fw-bolder" name="product_name">'.$row['name'].'</h5>
                        <!-- Product price-->
                        <div name="product_price">'.$row['price'].'</div>
                    </div>
                    <form method="POST" action="">
                        <input type="hidden" name="product_name" value="'.$row['name'].'">
                        <input type="hidden" name="product_price" value="'.$row['price'].'">
                        <input type="hidden" name="product_image" value="'.$row['image'].'">
                        <a href="deletejus.php?id='.$row['id'].'" class="btn btn-danger">supprimer</a>
                        <a href="updatejus.php?id='.$row['id'].'" class="btn btn-primary">Modifier le produit</a>
                    </form>
                </div>
            </div>
        </div>
    ';
}
?>

        </div>
    </div>
</section>
        
</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">monte en haut </a>
    </p>
    <p class="mb-1">By khelaifa oussama</p>
    <p class="mb-0"><a href="/"> </a> <a href="/docs/5.3/getting-started/introduction/ "> </a>.</p>
  </div>
</footer>


    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

      
  </body>
</html>