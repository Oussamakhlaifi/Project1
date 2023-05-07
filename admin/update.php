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
    <style>
        /* Center the main container */
.main {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  margin-top: 50px;
}

/* Style the form */
form {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  background-color: #f1f1f1;
  padding: 20px;
  border-radius: 10px;
  width: 400px;
}

/* Style the input fields */
input[type="text"],
button[type="submit"],
a {
  font-family: "Poppins", sans-serif;
  font-size: 16px;
  padding: 10px;
  margin: 10px;
  border: none;
  border-radius: 5px;
  width: 100%;
}

/* Style the label for file input */
label[for="file"] {
  font-family: "Poppins", sans-serif;
  font-size: 16px;
  padding: 10px;
  margin: 10px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  background-color: #e6e6e6;
}

/* Style the submit button */
button[type="submit"] {
  background-color: #4CAF50;
  color: white;
  cursor: pointer;
}

/* Style the link */
a {
  text-decoration: none;
  color: #4CAF50;
  font-size: 14px;
}

/* Style the heading */
h2 {
  font-family: "Cairo", sans-serif;
  font-size: 24px;
  margin-bottom: 20px;
}

/* Style the developer credit */
p {
  font-family: "Amiri", serif;
  font-size: 12px;
  margin-top: 50px;
}

    </style>
</head>
<body>
    <?php
    include('connect.php');
    $ID=$_GET['id'];
    $up = mysqli_query($conn, "select * from sanduitch where id =$ID");
    $data = mysqli_fetch_array($up);
    
    ?>
    <center>
        <div class="main">
            <form action="upjus.php" method="post" enctype="multipart/form-data">
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