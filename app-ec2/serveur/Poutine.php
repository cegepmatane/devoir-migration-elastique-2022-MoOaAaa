<?php
class Poutine implements JsonSerializable
{
  public static $filtres =
    array(
      'id' => FILTER_VALIDATE_INT,
      'nom' => FILTER_SANITIZE_ENCODED,
      'ingredients' => FILTER_SANITIZE_ENCODED,
      'prix' => FILTER_SANITIZE_ENCODED,
      'tailles' => FILTER_SANITIZE_ENCODED,
      'description' => FILTER_SANITIZE_ENCODED
    );

  protected $id;
  protected $nom;
  protected $ingredients;
  protected $prix;
  protected $tailles;
  protected $description;

  public function __construct($poutineObjet)
  {
    $tableau = filter_var_array((array) $poutineObjet, Poutine::$filtres);
    $this->id = $tableau['id'];
    $this->nom = $tableau['nom'];
    $this->ingredients = $tableau['ingredients'];
    $this->prix = $tableau['prix'];
    $this->tailles = $tableau['tailles'];
    $this->description = $tableau['description'];
  }

  public function __set($propriete, $valeur)
  {
    switch($propriete)
    {
      case 'id':
        $this->id = $valeur;
        break;
      case 'nom':
        $this->nom = $valeur;
        break;
      case 'ingredients':
        $this->ingredients = $valeur;
        break;
      case 'prix':
        $this->prix = $valeur;
        break;
      case 'tailles':
        $this->tailles = $valeur;
        break;
      case 'description':
        $this->description = $valeur;
        break;
    }
  }

  public function __get($propriete)
  {
    $self = get_object_vars($this);
    return $self[$propriete];
  }

  public function jsonSerialize()
  {
    //Define the fields we need
    return array(
      "id"=>$this->id,
      "nom"=>$this->nom,
      "ingredients"=>$this->ingredients,
      "prix"=>$this->prix,
      "tailles"=>$this->tailles,
      "description"=>$this->description
    );
  }
}