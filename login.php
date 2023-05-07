<?php

include 'connect.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `user_info` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:index.php');
   }else{
      $message[] = 'incorrect password or email!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>login</title>

   <!-- custom css file link  -->
   <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
   <style>
      input{
         text-align: center;
      }
      <style media="screen">
      *,
*:before,
*:after{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
}
body{
    background:url('data:image/jpeg;base64,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');
    background-color:black;
    background-size:cover;
}
.background{
    width: 430px;
    height: 520px;
    position: absolute;
    transform: translate(-50%,-50%);
    left: 50%;
    top: 50%;
}
.background .shape{
    height: 200px;
    width: 200px;
    position: absolute;
    border-radius: 50%;
}
.shape:first-child{
    background: linear-gradient(
        #1845ad,
        #23a2f6
    );
    left: -80px;
    top: -80px;
}
.shape:last-child{
    background: linear-gradient(
        to right,
        #ff512f,
        #f09819
    );
    right: -30px;
    bottom: -80px;
}
form{
    height: 520px;
    width: 400px;
    background-color: rgba(255,255,255,0.13);
    position: absolute;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    border-radius: 10px;
    backdrop-filter: blur(10px);
    border: 2px solid rgba(255,255,255,0.1);
    box-shadow: 0 0 40px rgba(8,7,16,0.6);
    padding: 50px 35px;
}
form *{
    font-family: 'Poppins',sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    outline: none;
    border: none;
}
form h3{
    font-size: 32px;
    font-weight: 500;
    line-height: 42px;
    text-align: center;
}

label{
    display: block;
    margin-top: 30px;
    font-size: 16px;
    font-weight: 500;
}
input{
    display: block;
    height: 50px;
    width: 100%;
    background-color: rgba(255,255,255,0.07);
    border-radius: 3px;
    padding: 0 10px;
    margin-top: 8px;
    font-size: 14px;
    font-weight: 300;
}
::placeholder{
    color: #e5e5e5;
}
button{
    margin-top: 50px;
    width: 100%;
    background-color: #ffffff;
    color: #080710;
    padding: 15px 0;
    font-size: 18px;
    font-weight: 600;
    border-radius: 5px;
    cursor: pointer;
}
.social{
  margin-top: 30px;
  display: flex;
}
.social div{
  background: red;
  width: 150px;
  border-radius: 3px;
  padding: 5px 10px 10px 5px;
  background-color: rgba(255,255,255,0.27);
  color: #eaf0fb;
  text-align: center;
}
.social div:hover{
  background-color: rgba(255,255,255,0.47);
}
.social .fb{
  margin-left: 25px;
}
.social i{
  margin-right: 4px;
}

    </style>
   </style>
</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>
   
<div class="form-container">

   <form action="" method="post">
      <h3>Connexion</h3>
      <label for="username">Username</label>
      <input type="email" name="email" required placeholder="email" class="box">
      <label for="password">Password</label>
      <input type="password" name="password" required placeholder="password" class="box">
      <input type="submit" name="submit" class="btn" value="Connexion" style="background-color:black;">
      <p>vous avez déjà un compte ?<a href="creat.php"> Nouveau compte</a></p>
   </form>

</div>

</body>
</html>