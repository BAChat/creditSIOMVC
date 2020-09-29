<?php

require_once 'DBInterface.php';
require_once 'ClientDAO.php';
require_once 'Metier/Compte.php';

class CompteDAO {

  // Renvoie la liste des comptes possedés par un client, stockés dans la base de données
  //Comme dans le TP Compte bancaire V7, on retourne une liste de Compte (objets métier)
  //On utilise une requête paramétrée (caractère ?)
  public static function getComptesParClient($idClient) {
    $sql = 'select comptenum, comptesolde, clientnum'
      . ' from compte'
	  . ' where clientnum=?';

    $lesComptes = DBInterface::executerRequete($sql, array($idClient));
	//$comptes est la liste d'objets métier qui sera retournée à la vue (la page qui s'affiche à l'écran).
	$comptes=array();
    foreach($lesComptes as $compte)
    {
        $numero=$compte['comptenum'];
        $comptes[$numero] = self::creerCompte($compte);
    }
    if(!empty($comptes))
        return $comptes;
    else
        throw new Exception("Aucun compte ne correspond à l'identifiant client '$idClient'");
  }

// Renvoie les informations sur un compte : sélection d'un compte par son numéro
	public static function getCompteParId($idCompte) {
    $sql = 'select comptenum, comptesolde, clientnum'
      . ' from compte'
      . ' where comptenum=?';
    $compte = DBInterface::executerRequete($sql, array($idCompte));
	//Cette requete retourne soit une ligne si le compte existe, soit aucune si il n'existe pas
    if ($compte->rowCount() == 1) {
      $leCompte = $compte->fetch();  // Accès à la première ligne de résultat
	  $compte = self::creerCompte($leCompte);	//On transforme la ligne de résultat en objet métier
	  return $compte;
	}
    else
      throw new Exception("Aucun compte ne correspond à l'identifiant '$idCompte'");
    }
	
//Met à jour le compte après une opération de virement ou retrait.

   public static function updateCompte($compte) {
	$idCompte = $compte->getNumero();
    $sql = 'UPDATE compte' 
	. ' SET comptesolde =?'
	. 'WHERE comptenum=?';
	$leCompte = DBInterface::executerRequete($sql, array($compte->getSolde(),$compte->getNumero()));
	//La méthode executerRequete de la classe DBInterface a été appelée.
	//Comme cette requête est paramétrée, la requête a été préparée.
	//La méthode prepare retourne un objet "PDOStatement" si la requête a été préparée avec succès.
	//Dans le cas contraire, une exception PDO est levée.
	//Ici, on teste si un objet a été retourné. Si oui, on construit un objet métier qui sera retourné à la vue.
	//Si non, on lève une nouvelle exception.
    if ($leCompte->rowCount() == 1) {
		return $leCompte->rowCount();
	}
    else
      throw new Exception("Mise à jour du compte : '$idCompte' impossible.");
  }

    private static function creerCompte($pCompte)
    {
		//Le paramètre $pCompte contient une ligne du résultat de la requête.
		//On accède aux valeurs de cette ligne colonne par colonne (une colonne = un champ du SELECT)
		//On instancie un objet Client, en invoquant la méthode getClientParId de la classe ClientDAO
		$idClient = $pCompte['clientnum'];
		$client = ClientDAO::getClientParId($idClient);
		
		//On transforme une ligne de résultat de requete en un objet métier.
		//$compte est un objet métier, instance de la classe Compte.
		//$client est une instance de la classe Client.
        $compte=new Compte($pCompte['comptenum'], $pCompte['comptesolde'],$client);
        return $compte;
    }
}