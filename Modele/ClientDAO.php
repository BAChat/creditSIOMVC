<?php

require_once 'DBInterface.php';
require_once 'Metier/Client.php';

class ClientDAO {

  // Renvoie la liste des clients stockés dans la base de données
  //Comme dans le TP Compte bancaire V7, on retourne une liste de Client (objets métier)
	public static function getClients() {
    $sql = 'select clientnum, clientnom, clientprenom, clientrue, clientcp, clientville, clientmobile, clientmail'
      . ' from client'
      . ' order by clientnum asc';
    $lesClients = DBInterface::executerRequete($sql);
	//$clients est la liste d'objets métier qui sera retournée à la vue (la page qui s'affiche à l'écran).
	$clients=array();
    foreach($lesClients as $client)
    {
        $numero=$client['clientnum'];
        $clients[$numero]=self::creerClient($client);
    }
    if(!empty($clients))
        return $clients;
    else
        throw new Exception("Selection des comptes impossible.");
  }

// Renvoie les informations sur un client : sélection d'un client par son numéro
	public static function getClientParId($idClient) {
    $sql = 'select clientnum, clientnom, clientprenom, clientrue, clientcp, clientville, clientmobile, clientmail'
      . ' from client'
	  . ' where clientnum=?';
    $client = DBInterface::executerRequete($sql, array($idClient));
    if ($client->rowCount() == 1) {
        $ligneClient = $client->fetch();
        $leClient = self::creerClient($ligneClient);
        return $leClient;
    }
    else
      throw new Exception("Aucun client ne correspond à l'identifiant '$idClient'");
    }

    private static function creerClient($pClient)
    {
		//Le paramètre $pClient contient une ligne du résultat de la requête.
		//On accède aux valeurs de cette ligne colonne par colonne (une colonne = un champ du SELECT)
		//On transforme une ligne de résultat de requete en un objet métier
        $client=new Client($pClient['clientnum'], $pClient['clientnom'],$pClient['clientprenom'], $pClient['clientrue'], $pClient['clientcp'], $pClient['clientville'], $pClient['clientmobile'], $pClient['clientmail']);
        return $client;
    }
}