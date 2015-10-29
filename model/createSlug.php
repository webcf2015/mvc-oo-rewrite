<?php

/**
 * Description of CreateSlug
 *
 * @author Family PITZ
 */
class CreateSlug {
    public static function slugify($chaine)
    {
        // décodons l'utf8 de notre contenu
        $retour = utf8_decode($chaine);
        // remplace les caractères accentués par leur version non accentuée
        $a = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞ 
ßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ'; 
        $b = 'aaaaaaaceeeeiiiidnoooooouuuuy 
bsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
        // remplacement avec transformation des caractères utf-8 de $a pour une comparaison avec notre chaine
        $retour = strtr( $retour,  utf8_decode($a),$b );
        // remplace les caractères non standards
        $retour = preg_replace(
                array(
                    '`^[^A-Za-z0-9]+`',
                    '`[^A-Za-z0-9]+$`',
                    '`[^A-Za-z0-9]+`' ),
                array('','','-'),
                $retour );
        return $retour;
    }
}
