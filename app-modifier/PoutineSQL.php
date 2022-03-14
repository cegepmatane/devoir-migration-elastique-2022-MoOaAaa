<?php
interface PoutineSQL
{
  public const SQL_LISTER          = "SELECT * FROM poutine;";
  public const SQL_CHERCHER_PAR_ID = "SELECT * FROM poutine WHERE id = :id;";
  public const SQL_AJOUTER         = "INSERT INTO poutine (nom, ingredients, prix, tailles, description) VALUES (:nom, :ingredients, :prix, :description);";
  public const SQL_MODIFIER        = "UPDATE poutine SET nom  = :nom, ingredients = :ingredients, prix = :prix, tailles = :tailles, description = :description WHERE id = :id;"; //TODO
}
