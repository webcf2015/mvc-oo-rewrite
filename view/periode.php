<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1>Les Poètes Francophones section <?php echo $periode['laperiode'] ?>e siècle</h1>
    <?php
        include 'view/menu.php';
    ?>
    <?php // boucle qui affiche le nom et la bio 250 + lien de tous les écrivains ?>
    <?php foreach($tous_ecrivains AS $key => $value): ?>
        <h2><?php echo $value->lenom ?></h2>
        <p>
        <?php
        $txt = substr($value->labio, 0, 250);
        $pos = strrpos($txt, ' ');
        $txt = substr($txt, 0, $pos);
        echo $txt;
        ?>...
        <a href="./?idecrivain=<?php echo $value->id ?>">Lire plus</a>
        </p>
    <?php endforeach; ?>
</body>
</html>
