<?php
include 'connect.php';
session_start();
$user_id = $_SESSION['user_id'];

if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'") or die('query failed');
    header('location:panier.php');
 }
   
 
 

$grand_total = 0;
error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/blog/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    

    <title>panier</title>
</head>
<body>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
    <!-- import Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
</head>
<body>

<section class="vh-100" style="background-color: #fdccbc;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
               <p style="text-align:centre;" ><span class="h2" >Votre Panier </span><span class="h4">(1 item in your cart)</span></p><br>
                <div class="card mb-4">
                    <div class="card-body p-4">
                        <div class="row align-items-center mb-3">
                            <div class="col-md-2">
                                <p class="small text-muted mb-4 pb-2">Image</p>
                            </div>
                            <div class="col-md-2 d-flex justify-content-center">
                                <div>
                                    <p class="small text-muted mb-4 pb-2">Name</p>
                                </div>
                            </div>
                            <div class="col-md-2 d-flex justify-content-center">
                                <div>
                                    <p class="small text-muted mb-4 pb-2">supprimer</p>
                                </div>
                            </div>
                            <div class="col-md-2 d-flex justify-content-center">
                                <div>
                                    <p class="small text-muted mb-4 pb-2">Quantity</p>
                                </div>
                            </div>
                            <div class="col-md-2 d-flex justify-content-center">
                                <div>
                                    <p class="small text-muted mb-4 pb-2">Price</p>
                                </div>
                            </div>
                            <div class="col-md-2 d-flex justify-content-center">
                                <div>
                                    <p class="small text-muted mb-4 pb-2">Total</p>
                                </div>
                            </div>
                        </div>
                        <?php
                        include('connect.php');
                        $resultat = mysqli_query($conn, 'SELECT * FROM cart');
                        
                        ?>
                        
                        <?php
                        
                        foreach ($resultat as $row){
                            $price = floatval($row['price']);
                            $quantity = intval($row['quantity']);
                            $sub_total = $price * $quantity;?>
                            <div class="row align-items-center mb-3">
                                <div class="col-md-2">
                                <img src="<?php echo $row['image']; ?>" class="card-img-top" style="border-radius:50%;height: 100px; width: 100px">                            </div>
                                <div class="col-md-2 d-flex justify-content-center">
                                    <div>
                                        <p class="lead fw-normal mb-0"><?php echo $row['name']; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-2 d-flex justify-content-center">
                                    <div>
                                    <a href="panier.php?remove=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('vous voules vraiment supprimer cette produit');"> supprimer</a>
                                    </div>
                                </div>
                                <div class="col-md-2 d-flex justify-content-center">
                                    <div>
                                        <p class="lead fw-normal mb-0"><?php echo $row['quantity']; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-2 d-flex justify-content-center">
                                    <div>
                                        <p class="lead fw-normal mb-0"><?php echo $row['price']; ?></p>
                                    </div>
                                </div>
                                <div class="col-md-2 d-flex justify-content-center">
                                    <div>
                                        <p class="lead fw-normal mb-0"><?php echo number_format($sub_total, 2) . " $"; ?></p>
                                    </div>
                                    </div>
                                </div>
                                <?php
         $grand_total += $sub_total;
                                                                   
        
      ?>
                              
                             
                                <?php } ?> 
                    

<div class="card mb-5">
              <div class="card-body p-4">
                <div class="float-end">
                  <p class="mb-0 me-5 d-flex align-items-center">
                    <span class="small text-muted me-2">Order total:</span> <span class="lead fw-normal"><?php echo $grand_total; ?>$</span>
                  </p>
                </div>
              </div>
            </div>
            

            <div class="d-flex justify-content-end">
          <button type="button" class="btn btn-light btn-lg me-2"><a href="index.php" style="text-decoration:none;color:black;"> Continue shopping</a></button>
    </div>

        </div>
    </div>
  </div>
</section>
            </body>
            </html>