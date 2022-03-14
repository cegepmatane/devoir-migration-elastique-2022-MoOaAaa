<?php
require_once("Poutine.php");
require_once("PoutineSQL.php");

class Accesseur
{
  public static $baseDeDonnees = null;

  public static function initialiser()
  {
    $base = 'app-poutine';
    $hote = 'app-poutine.cqbi9evth5qj.us-east-1.rds.amazonaws.com';
    $usager = 'Lheidet';
    $motDePasse = 'WBuLEorkf0UgdR8ooFxk26yDDUVtHQ';
    $nomDeSourceDeDonnees = 'mysql:dbname=' . $base . ';host=' . $hote;
    PoutineDAO::$baseDeDonnees = new PDO($nomDeSourceDeDonnees, $usager, $motDePasse);
    PoutineDAO::$baseDeDonnees->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
}

class PoutineDAO extends Accesseur implements PoutineSQL
{
  public static function lister()
  {
    PoutineDAO::initialiser();

    $demandeListePoutine = PoutineDAO::$baseDeDonnees->prepare(PoutineDAO::SQL_LISTER);
    $demandeListePoutine->execute();
    $listePoutineObjet = $demandeListePoutine->fetchAll(PDO::FETCH_OBJ);
    //$contratsTableau = $demandelistePoutine->fetchAll(PDO::FETCH_ASSOC);
    $listePoutine = null;
    foreach($listePoutineObjet as $poutineObjet) $listePoutine[] = new Poutine($poutineObjet);
    return $listePoutine;
  }

  public static function chercherParId($id)
  {
    PoutineDAO::initialiser();

    $demandePoutine = PoutineDAO::$baseDeDonnees->prepare(PoutineDAO::SQL_CHERCHER_PAR_ID);
    $demandePoutine->bindParam(':id', $id, PDO::PARAM_INT);
    $demandePoutine->execute();
    $poutineObjet = $demandePoutine->fetchAll(PDO::FETCH_OBJ)[0];
    //$contrat = $demandePoutine->fetch(PDO::FETCH_ASSOC);
    return new Poutine($poutineObjet);
  }

  public static function ajouter($poutine)
  {
    PoutineDAO::initialiser();

    $demandeAjoutPoutine = PoutineDAO::$baseDeDonnees->prepare(PoutineDAO::SQL_AJOUTER);
    $demandeAjoutPoutine->bindValue(':nom', $poutine->nom, PDO::PARAM_STR);
    $demandeAjoutPoutine->bindValue(':ingredients', $poutine->ingredients, PDO::PARAM_STR);
    $demandeAjoutPoutine->bindValue(':prix', $poutine->prix, PDO::PARAM_STR);
    $demandeAjoutPoutine->bindValue(':tailles', $poutine->tailles, PDO::PARAM_STR);
    $demandeAjoutPoutine->bindValue(':description', $poutine->description, PDO::PARAM_STR);
    $demandeAjoutPoutine->execute();
    return PoutineDAO::$baseDeDonnees->lastInsertId();
  }

  public static function modifier($poutine)
  {
    PoutineDAO::initialiser();

    $demandeModifierPoutine = PoutineDAO::$baseDeDonnees->prepare(PoutineDAO::SQL_MODIFIER);
    $demandeModifierPoutine->bindParam(':id', $poutine->id, PDO::PARAM_INT);
    $demandeModifierPoutine->bindValue(':nom', $poutine->nom, PDO::PARAM_STR);
    $demandeModifierPoutine->bindValue(':ingredients', $poutine->ingredients, PDO::PARAM_STR);
    $demandeModifierPoutine->bindValue(':prix', $poutine->prix, PDO::PARAM_STR);
    $demandeModifierPoutine->bindValue(':tailles', $poutine->tailles, PDO::PARAM_STR);
    $demandeModifierPoutine->bindValue(':description', $poutine->description, PDO::PARAM_STR);
    $demandeModifierPoutine->execute();
    return PoutineDAO::chercherParId($poutine->id);
  }
}
