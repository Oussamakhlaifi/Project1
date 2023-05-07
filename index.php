<?php
include('connect.php');
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};
if(isset($_POST['add_to_cart'])){

    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];
 
    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');
 
    if(mysqli_num_rows($select_cart) > 0){
       $message[] = 'Produit déjà ajouté au panier !';
    }else{
       mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, image, quantity) VALUES('$user_id', '$product_name', '$product_price', '$product_image', '$product_quantity')") or die('query failed');
       $message[] = 'Le produit est ajouté au panier!';
    }
 
 };
 if(isset($_GET['logout'])){
    unset($user_id);
    session_destroy();
    header('location:login.php');
 };

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Blog Template · Bootstrap v5.3</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/blog/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    

    

<link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.3/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.3/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>OUSSAMA-FOOD</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">BIENVENUE SUR VOTRE RESTAURENT</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!"></a></li>
                        <li class="nav-item"><a class="nav-link" href="#!"></a></li>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex" method="get">
                        <button class="btn btn-outline-dark" type="submit" href="panier.php"><a href="panier.php" style="text-decoration:none;color:black;">
                            <i class="bi-cart-fill me-1"></i>
                            Panier
                            <span class="badge bg-dark text-white ms-1 rounded-pill"></span>
                            </button>
                            </a>
                            <button class="btn btn-outline-red" type="submit" name="logout">
                            Log Out
                            <span class="badge bg-dark text-white ms-1 rounded-pill"></span>
                            </button>
                        </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5" style="background-image:url('https://recettes.de/images/blogs/cakes-paradise/20-recettes-de-sandwichs-indiens-faciles.640x480.jpg')">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">BIENVENUE SUR VOTRE RESTAURENT</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Ici vous trouvez les meilleurs plats</p>
                </div>
            </div>
        </header>
        <!-- Section-plats-->
        <h1 class="display-1" style="text-align:center;">plats</h2>
        <section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
        <?php
$result = mysqli_query($conn, "SELECT * FROM plats");
while($row = mysqli_fetch_array($result)){
    echo '
        <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
            <div class="card h-100">
                <!-- Product image-->
                <img src="'.$row['image'].'" class="card-img-top" name="product_image" height: 200px;>
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
                        <input type="number" name="product_quantity" value="1" min="1" max="10">
                        <input type="submit" name="add_to_cart" value="Add to cart" class="btn btn-warning">
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
                       <section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
        <?php
$result = mysqli_query($conn, "SELECT * FROM sanduitch");
while($row = mysqli_fetch_array($result)){
    echo '
        <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
            <div class="card h-100">
                <!-- Product image-->
                <img src="'.$row['image'].'" class="card-img-top" name="product_image" height: 200px;>
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
                        <input type="number" name="product_quantity" value="1" min="1" max="10">
                        <input type="submit" name="add_to_cart" value="Add to cart" class="btn btn-warning">
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
        <section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
        <?php
$result = mysqli_query($conn, "SELECT * FROM jus");
while($row = mysqli_fetch_array($result)){
    echo '
        <div class="col-lg-3 col-md-4 col-sm-6 mb-5">
            <div class="card h-100">
                <!-- Product image-->
                <img src="'.$row['image'].'" class="card-img-top" name="product_image" height: 200px;>
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
                        <input type="number" name="product_quantity" value="1" min="1" max="10">
                        <input type="submit" name="add_to_cart" value="Add to cart" class="btn btn-warning">
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
                        
        
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
