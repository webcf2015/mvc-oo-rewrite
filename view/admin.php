<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1>Admin</h1>
    <ul>
        <li><a href="./">Ajouter des écrivains et des livres</a></li>
        <li><a href="./?manage">Gérer les écrivains et les livres</a></li>
        <li><a href="./?deconnect">Déconnexion</a></li>
    </ul>

    <h2>Ajouter un écrivain</h2>

    <form action="" method="POST">
        <label for="lenom">Le nom complet de l'écrivain</label><br>
        <input id="lenom" type="text" name="lenom"><br>
        <label for="siecle">Siècle</label><br>
        <select id="siecle" name="siecle">
        <?php foreach($siecles AS $key => $value): ?>
            <option value="<?php echo $value->id ?>"><?php echo $value->laperiode ?></option>
        <?php endforeach; ?>
        </select><br>
        <label for="labio">La biographie</label><br>
        <textarea id="labio" name="labio" cols="30" rows="10"></textarea><br><br>
        <input type="submit" name="submitajouterecrivain" value="Ajouter">
    </form>

    <h2>Ajouter un livre</h2>

    <form action="" method="POST">
        <label for="letitre">Le titre du livre</label><br>
        <input type="text" name="letitre"><br>

        <label for="lecrivain">L'auteur du livre</label><br>
        <select id="lecrivain" name="lecrivain">
        <?php foreach($ecrivains AS $key => $value): ?>
            <option value="<?php echo $value->id ?>"><?php echo $value->lenom ?></option>
        <?php endforeach; ?>
        </select><br>

        <label for="lasortie">Date de sortie</label><br>
        <input id="lasortie" type="text" name="lasortie"><br>

        <label for="ladescription">Description</label><br>
        <textarea id="ladescription" name="ladescription" cols="30" rows="10"></textarea><br><br>
        <input type="submit" name="submitajouterlivre" value="Ajouter">
    </form>
</body>
</html>
