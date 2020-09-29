<?php

class Compte
{
    private $numero;
    private $solde;
    private $titulaire;
	
    
   public function __construct($numero, $solde, $titulaire)
    {
        $this->numero = $numero;
        $this->solde = $solde;
        $this->titulaire = $titulaire;
    }
    
    public function getNumero()
    {
        return $this->numero;
    }

    public function getSolde()
    {
        return $this->solde;
    }

    public function setSolde($solde)
    {
        $this->solde = $solde;
    }

    public function getTitulaire()
    {
        return $this->titulaire;
    }

    public function deposer($montant) {
        $this->solde += $montant;
    }
    
	public function retirer($montant) {
        $this->solde -= $montant;
    }
	
    public function __toString()
    {
        return "Le solde du compte de $this->titulaire est de " .
            $this->solde . " " . "€";
    }
}