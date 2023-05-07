<?php

include('connect.php');

if(isset($_POST['update'])){
    $ID = $_POST['id'];
    $NAME  = $_POST['name'];
    $PRICE = $_POST['price'];
    $IMAGE = $_FILES['image'];
    $image_location = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
    move_uploaded_file($image_location,'images/'.$image_name);
    $image_up = "images/".$image_name;
    $update = "UPDATE plats SET name='$NAME' , price='$PRICE', image='$image_up' WHERE id=$ID";
    mysqli_query($conn, $update);

    header('location: index.php');
}
?>