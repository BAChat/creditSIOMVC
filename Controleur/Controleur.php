<?php

require_once 'Modele/ClientDAO.php';
require_once 'Modele/CompteDAO.php';


// Affiche la liste de tous les clients
function accueil()
{
    $lesClients = ClientDAO::getClients();
    require 'Vues/VueClients.php';
}

// Affiche les comptes d'un client
function comptes($idClient)
{
    $lesComptes = CompteDAO::getComptesParClient($idClient);
    //On teste si le tableau n'est pas vide : ce qui signifie que la requête sur la BDD a réussi
    if(!empty($lesComptes)) {
        //Le tableau contient les comptes du client dont l'id est passé en paramètre.
        //Chaque compte encapsule un attribut titulaire de type Client.
        //Chaque compte a le même titulaire. Avec la fonction current, on extraie le premier compte
        //de la collection (array $lesComptes)
        $leCompte = current($lesComptes);
        //Le compte ayant été récupéré, on extraie le client à qui appartient le compte
        $leClient = $leCompte->getTitulaire();
        require 'Vues/VueComptes.php';
    }
}

//Affiche un compte d'un client afin de faire des opérations dessus
function compte($idCompte)
{
    $leCompte = CompteDAO::getCompteParId($idCompte);
    require 'Vues/VueCompte.php';
}

//Effectue la mise à jour d'un compte en BDD, après opération
function miseAJourCompte($idCompte, $montant, $typeOperation)
{
    $leCompte = CompteDAO::getCompteParId($idCompte);
    //On effectue l'opération
    if($typeOperation == 'Retrait')
        //On procède au retrait sur le compte
        $leCompte->retirer($montant);
    else
        //On procède au virement
        $leCompte->deposer($montant);
    //On procède à la mise à jour du compte sur la BDD
    $rowsAffected = CompteDAO::updateCompte($leCompte);
    require ('Vues/VueMAJCompte.php');
}
// Affiche une erreur
function erreur($msgErreur)
{
    //require 'vueErreur.php';
}
