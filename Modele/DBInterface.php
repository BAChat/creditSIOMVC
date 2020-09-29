<?php

class DBInterface {

  // Objet PDO d'accès à la BD
  private static $bdd;

  // Exécute une requête SQL éventuellement paramétrée.
  // Le mot-clé self est un opérateur de résolution de portée : comme l'attribut $bdd et la méthode getBDD sont statiques,
  // On ne peut y faire référence avec le mot-clé $this.
  public static function executerRequete($sql, $params = null) {
    if ($params == null) {
      $resultat = self::getBdd()->query($sql);    // exécution directe
    }
    else {
      $resultat = self::getBdd()->prepare($sql);  // requête préparée
      $resultat->execute($params);
    }
    return $resultat;
  }
  
  // Renvoie un objet de connexion à la BD en initialisant la connexion au besoin
  private  static function getBdd() {
    if (self::$bdd == null) {
      // Création de la connexion
      self::$bdd = new PDO('mysql:host=localhost;dbname=creditsio;charset=utf8',
        'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    return self::$bdd;
  }

}