<?php

namespace libs\modele;
enum Statut: string
{
    case ACTIF = 'ACTIF';
    case BLESSE = 'BLESSE';
    case SUSPENDU = 'SUSPENDU';
    case ABSENT = 'ABSENT';
}

?>