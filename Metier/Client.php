<?php

class Client
{
    private $numero;
    private $nom;
    private $prenom;
    private $rue;
    private $codePostal;
    private $ville;
	private $mobile;
	private $email;
	
	public function __construct($numero, $nom, $prenom, $rue, $codePostal, $ville, $mobile, $email)
    {
        $this->numero = $numero;
		$this->nom = $nom;
		$this->prenom = $prenom;
		$this->rue = $rue;
		$this->codePostal = $codePostal;
		$this->ville = $ville;
		$this->mobile = $mobile;
		$this->email = $email;
    }

    //Setter
    public function setNumero($numero){ $this->numero = $numero; }
	public function setNom($nom){ $this->nom = $nom; }
	public function setPrenom($prenom){ $this->prenom = $prenom; }
	public function setRue($rue){ $this->rue = $rue; }
	public function setCodePostal($codePostal){ $this->codePostal = $codePostal; }
	public function setVille($ville){ $this->ville = $ville; }
	public function setMobile($mobile){ $this->mobile = $mobile; }
	public function setEmail($email){ $this->email = $email; }

    //Getter
    public function getNumero() { return $this->numero; }
	public function getNom(){ return $this->nom; }
	public function getPrenom() { return $this->prenom; }
	public function getRue() { return $this->rue; }
	public function getCodePostal() { return $this->codePostal; }
	public function getVille() { return $this->ville; }
	public function getMobile() { return $this->mobile; }
	public function getEmail() { return $this->email; }
    
    public function __toString(){
        $maChaine=$this->numero.' '.$this->nom.' '.$this->prenom.' '.$this->rue.' '.$this->codePostal.' '.$this->ville.' '.$this->mobile.' '.$this->email.'<BR>';
        return $maChaine;
    }
}