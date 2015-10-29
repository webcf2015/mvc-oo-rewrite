<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <script>
    function parachute(message){
        if(!confirm(message)) return false;
    }
    </script>
</head>
<body>
    <h1>Gérer les écrivains et les livres</h1>

    <ul>
        <li><a href="./">Ajouter des écrivains et des livres</a></li>
        <li><a href="./?manage">Gérer les écrivains et les livres</a></li>
        <li><a href="./?deconnect">Déconnexion</a></li>
    </ul>

    <?php // manage writer ?>
    <?php if(isset($_GET['mod'])): ?>
        <h2>
            Modifier l'écrivain : <?php echo $ecrivain['lenom']?>
        </h2>
        <form action="?manage" method="POST">
            <label for="lenom">Le nom complet de l'écrivain</label><br>
            <input id="lenom" type="text" name="lenom" value="<?php echo $ecrivain['lenom']?>"><br>
            <label for="siecle">Siècle</label><br>
            <select id="siecle" name="sciecle_id">
            <?php foreach($siecles AS $key => $value): ?>
                <?php $and = ($value->id == $ecrivain['sciecle_id']) ? 'selected' : '' ?>
                <option value="<?php echo $value->id ?>" <?php echo $and ?>><?php echo $value->laperiode ?></option>
            <?php endforeach; ?>
            </select><br>
            <label for="labio">La biographie</label><br>
            <textarea id="labio" name="labio" cols="30" rows="10"><?php echo $ecrivain['labio'] ?></textarea><br><br>
            <input type="hidden" name="id" value="<?php echo $ecrivain['id'] ?>">
            <input type="submit" name="submitmodifierecrivain" value="Modifier">
        </form>
    <?php elseif(isset($_GET['modlivre'])): ?>
        <h2>
            Modifier le livre : <?php echo $livre['letitre']?>
        </h2>
        <form action="?manage" method="POST">
            <label for="letitre">Le titre du livre</label><br>
            <input type="text" name="letitre" value="<?php echo $livre['letitre'] ?>" ><br>

            <label for="lecrivain">L'auteur du livre</label><br>
            <select id="lecrivain" name="ecrivain_id">
            <?php foreach($ecrivains AS $key => $value): ?>
                <?php $and = ($value->id == $livre['ecrivain_id']) ? 'selected' : '' ?>
                <option value="<?php echo $value->id ?>" <?php echo $and ?>><?php echo $value->lenom ?></option>
            <?php endforeach; ?>
            </select><br>

            <label for="lasortie">Date de sortie</label><br>
            <input id="lasortie" type="text" name="lasortie" value="<?php echo $livre['lasortie'] ?>"><br>

            <label for="ladescription">Description</label><br>
            <textarea id="ladescription" name="ladescription" cols="30" rows="10"><?php echo $livre['ladescription'] ?></textarea><br><br>
            <input type="hidden" name="id" value="<?php echo $livre['id'] ?>">
            <input type="submit" name="submitmodifierlivre" value="Modifier">
        </form>
    <?php else: ?>
        <ul>
        <?php foreach($ecrivains AS $key => $value): ?>
            <li>
                <p>
                    <b><?php echo $value->lenom?></b>
                    <a href="./?manage&mod=<?php echo $value->id ?>">Modifier</a>
                    <a href="./?manage&del=<?php echo $value->id ?>" onclick="return parachute('Vous êtes sûr de vouloir supprimer cet écrivain ? Tous les livres associés à cet écrivain seront aussi supprimés')">Supprimer</a>
                </p>

                <ul>
                <?php foreach($livres AS $key1 => $value1): ?>
                    <?php if($value1->ecrivain_id == $value->id): ?>
                    <li>
                        <?php echo $value1->letitre ?>
                        <a href="./?manage&modlivre=<?php echo $value1->id ?>">Modifier</a>
                        <a href="./?manage&dellivre=<?php echo $value1->id ?>" onclick="return parachute('Vous êtes sûr de vouloir supprimer ce livre ?')">Supprimer</a>
                    </li>
                    <hr>
                    <?php endif; ?>
                <?php endforeach; ?>
                </ul>
            </li>
            <hr>
        <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>
