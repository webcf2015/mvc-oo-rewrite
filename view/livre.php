<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1>Les Poètes Francophones section Livre : <?php echo $livre['letitre'] ?></h1>
    <?php
        include 'view/menu.php';
    ?>
    <h2><?php echo $livre['letitre'] ?> (<small><?php echo $livre['lasortie'] ?></small>)</h2>
    <p><?php echo nl2br($livre['ladescription']) ?></p>

</body>
</html>
