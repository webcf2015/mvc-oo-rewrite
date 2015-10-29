<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1>Connexion</h1>
    <?php if (isset($error)) echo '<mark>' . $error . '</mark>' ?>
    <form action="" method="POST">
        <label for="user">Nom d'utilisateur</label><br>
        <input id="user" type="text" name="user" required><br>
        <label for="pass">Mot de passe</label><br>
        <input id="pass" type="password" name="pass" required><br><br>
        <input type="submit" value="Connexion">
    </form>
</body>
</html>
