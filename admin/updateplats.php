<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri&family=Cairo:wght@200&family=Poppins:wght@100;200;300&family=Tajawal:wght@300&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update | Modifier</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <?php
    include('connect.php');
    $ID=$_GET['id'];
    $up = mysqli_query($conn, "select * from plats where id =$ID");
    $data = mysqli_fetch_array($up);
    
    ?>
    <center>
        <div class="main">
            <form action="upplats.php" method="post" enctype="multipart/form-data">
                <h2>Modifier le produit</h2>
                <input type="text" name='id' value='<?php echo $data['id']?>'  style='display:none;'>
                <br>
                <input type="text" name='name' value='<?php echo $data['name']?>'>
                <br>
                <input type="text" name='price' value='<?php echo $data['price']?>'>
                <br>
                <input type="file" id="file" name='image' style='display:none;'>
                <label for="file"> Modifier la photo</label>
                <button name='update' type='submit'>Modifier le produit</button>
                <br><br>
                <a href="index.php">Affichier tous les produits</a>
            </form>
        </div>
        <p>Developer By Oussama</p>
    </center>
</body>
</html>