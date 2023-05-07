<?php
// Connexion à la base de données
include('connect.php');

// Vérifie si les champs d'identification ont été soumis
if($_SERVER["REQUEST_METHOD"] == "POST") {
  // Vérifie si les champs d'identification ont été remplis
  if(isset($_POST["email"]) && isset($_POST["password"])) {
    // Échappe les caractères spéciaux pour éviter les injections SQL
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = mysqli_real_escape_string($conn, $_POST["password"]);

    // Recherche dans la base de données pour les correspondances d'adresse e-mail et mot de passe
    $sql = "SELECT * FROM admin_info WHERE email = '$email' AND password = '$password'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1) {
      // Si les identifiants sont valides, redirige vers la deuxième page
      header("Location: principale.php");
      exit();
    } else {
      // Sinon, affiche un message d'erreur
      $error = "Adresse e-mail ou mot de passe incorrect.";
    }
  } else {
    // Affiche un message d'erreur si les champs d'identification ne sont pas remplis
    $error = "Veuillez remplir tous les champs.";
  }
}

// Fermeture de la connexion à la base de données
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Page de Login</title>
    <style>
        .login-container {
  width: 30%;
  margin: auto;
  margin-top: 50px;
  padding: 20px;
  border: 1px solid black;
  border-radius: 10px;
}

h1 {
  text-align: center;
  margin-bottom: 20px;
}

label {
  display: block;
  margin-bottom: 10px;
}

input[type="text"], input[type="password"] {
  width: 100%;
  padding: 10px;
  margin-bottom: 20px;
  border: 1px solid black;
  border-radius: 5px;
}

input[type="submit"] {
  width: 100%;
  padding: 10px;
  background-color: #4CAF50;
  color: white;
  border: none;
  border-radius: 5px;
  cursor: pointer;
}

    </style>
  </head>
  <body>
    <div class="login-container">
      <h1>Connectez-vous</h1>
      <form method="post" action="login.php">
        <label for="email">Nom d'utilisateur:</label>
        <input type="text" id="email" name="email" required>
        <br>
        <label for="password">Mot de passe:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" value="Connexion">
      </form>
    </div>
  </body>
</html>
