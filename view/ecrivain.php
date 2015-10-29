<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1>Les Poètes Francophones section <?php echo $ecrivain['lenom'] ?></h1>
    <?php
        include 'view/menu.php';
    ?>
    <h2><?php echo $ecrivain['lenom'] ?></h2>
    <p><?php echo nl2br($ecrivain['labio']) ?></p>
    <?php // boucle qui affiche tous les livres de cet écrivain ?>

    <?php foreach($titres AS $key => $value): ?>
        <h2><?php echo $titres[$key] ?></h2>
        <p><?php
        $txt = substr($descriptions[$key], 0, 100);
        $pos = strrpos($txt, ' ');
        $txt = substr($txt, 0, $pos);
        echo $txt;
        ?>... <a href="./?idlivre=<?php echo $ids[$key] ?>">Lire plus</a></p>
    <?php endforeach; ?>
</body>
</html>
