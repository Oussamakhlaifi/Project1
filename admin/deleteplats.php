<?php

include('connect.php');
$ID = $_GET['id'];
mysqli_query($conn, "DELETE FROM plats WHERE id=$ID");
header('location: index.php')

?>