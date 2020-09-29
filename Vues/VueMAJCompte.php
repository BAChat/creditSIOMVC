<?php
	require_once 'Metier/Compte.php';

    if($rowsAffected != 0)
    //On affiche les données mises à jour
        echo 'Mise à jour du compte effectuée ; le nouveau solde se monte à ' . $leCompte->getSolde();
