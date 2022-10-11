<?php
  require_once __DIR__."/../Model.php";

  class APIRequester extends Model {
    public function getDBPartners() {
      $req = "SELECT * FROM partners";
      $stmt = $this->getDB()->prepare($req);
      $stmt->execute();
      $partners = $stmt->fetchAll(PDO::FETCH_ASSOC);
      $stmt->closeCursor();
      return $partners;
    }
  }