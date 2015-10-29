<ul>
    <li>
        <a href="./">Accueil</a>
    </li>
<?php foreach($menu AS $value) :?>
    <li>
        <a href="./?idperiode=<?php echo $value->id ?>"><?php echo $value->laperiode; ?></a>
    </li>
<?php endforeach; ?> 
    <li>
        <a href="./?connect">Connexion</a>
    </li>
</ul>

