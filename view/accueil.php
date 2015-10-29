<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1>Bienvenue sur Les Poètes Francophones</h1>
    <?php
        include 'view/menu.php';
    ?>
    <?php // affichage de l'écrivain au hasard ?>
    <h2>Écrivain au hasard</h2>
    <p><?php echo $ecrivain_random['lenom'] ?></p>    
    <p><?php echo nl2br($ecrivain_random['labio']) ?></p>    
</body>
</html>
