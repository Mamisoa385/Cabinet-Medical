<?php
// src/Enum/Sexe.php
namespace App\Enum;

enum Sexe: string
{
    case HOMME = 'Homme';
    case FEMME = 'Femme';
    case AUTRE = 'Autre';
}
?>