<ul>
    <li>
        <a href="<?php echo CHEMIN_ABSOLU ?>">Accueil</a>
    </li>
<?php foreach($menu AS $value) :?>
    <li>
        <a href="<?php echo CHEMIN_ABSOLU ?>periode/<?php echo $value->leslug ?>/"><?php echo $value->laperiode; ?></a>
    </li>
<?php endforeach; ?> 
    <li>
        <a href="<?php echo CHEMIN_ABSOLU ?>?connect">Connexion</a>
    </li>
</ul>

