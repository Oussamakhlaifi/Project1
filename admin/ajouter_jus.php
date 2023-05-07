<?php

include('connect.php');

if(isset($_POST['upload'])){
    $NAME  = $_POST['name'];
    $PRICE = $_POST['price'];
    $IMAGE = $_FILES['image'];
    $image_location = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    move_uploaded_file($image_location,'images/'. $image_name);
    $image_up = "images/".$image_name;
    $insert = "INSERT INTO  jus (name, price ,image) VALUES ('$NAME','$PRICE','$image_up')";
    mysqli_query($conn, $insert);
    header('location: index.php');
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri&family=Cairo:wght@200&family=Poppins:wght@100;200;300&family=Tajawal:wght@300&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un produit</title>
    <link rel="stylesheet" href="index.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/blog/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    
</head>
<body>
<center>
    <section class="vh-100">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-6 text-black">

        <div class="px-5 ms-xl-4">
          <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
          <span class="h1 fw-bold mb-0" style="margin-right:250px;">Boisson</span>
        </div>
        <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">
            <form action="" method="post" enctype="multipart/form-data" style="width: 23rem;">
            <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Ajouter boisson</h3>
                <div class="form-outline mb-4">
                <label class="form-label" for="form2Example18">Nom du produits</label>
                <input type="text" id="form2Example18" class="form-control form-control-lg" type="text" name='name'>
                
                </div>
                <div class="form-outline mb-4">
                <label class="form-label" for="form2Example28">Prix</label>
                <input type="text" id="form2Example28" class="form-control form-control-lg" type="text" name='price'>
                
                </div>
                <input type="file" id="file" name='image' style='display:none;'>
                <div class="pt-1 mb-4">
                <label for="file"> choisir la photo</label>
                <button name='upload'>Ajouter cette produits✅</button>
</div>
</div>
                <a href="principale.php">Affiche tous les produits</a>
            </form>
        </div>
        <div class="col-sm-6 px-0 d-none d-sm-block">
        <img src="images/juss.jpg"
          alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
      </div>
        
    </center>
</body>
</html>