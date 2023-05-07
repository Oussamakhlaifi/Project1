<?php

include('connect.php');
$ID = $_GET['id'];
mysqli_query($conn, "DELETE FROM sanduitch WHERE id=$ID");
header('location: index.php')

?>