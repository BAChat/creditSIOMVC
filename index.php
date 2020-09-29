<?php
    require('Controleur/Controleur.php');
    require('Utilitaires/failles.php');

    try {
        if (isset($_GET['action'])) {
            //Situation 1 : affichage des comptes d'un client, sélectionnés par $idClient
            if ($_GET['action'] == 'comptes') {
                if (isset($_GET['id'])) {
                    $idClient = escape($_GET['id']);
                    comptes($idClient);
                } else
                    throw new Exception("Identifiant du client non défini");
            } else {
                //Situation 2 : affichage d'un compte d'un client, sélectionné par $idCompte
                if ($_GET['action'] == 'compte') {
                    if (isset($_GET['id'])) {
                        $idCompte = escape($_GET['id']);
                        compte($idCompte);
                    } else
                        throw new Exception("Identifiant du compte non défini");
                } else {
                    //Situation 3 : Mise à jour d'un compte sélectionné par id
                    if ($_GET['action'] == 'MAJCompte') {
                        if (!empty($_POST['montant']) && !empty($_POST['typeoperation']) && !empty($_POST['idCompte'])) {
                            $montant = escape($_POST['montant']);
                            $typeoperation = escape($_POST['typeoperation']);
                            $idCompte = escape($_POST['idCompte']);
                            miseAJourCompte($idCompte, $montant, $typeoperation);
                        } else
                            throw new Exception("Données saisies invalides.");
                    }
                    else
                        throw new Exception("Action non valide");
                }
            }
        }
        else
            accueil();  // action par défaut (liste de tous les clients)
    }
    catch (Exception $e) {
        //erreur($e->getMessage());
        echo '<html><body>Erreur ! ' . $e->getMessage() . '</body></html>';
    }