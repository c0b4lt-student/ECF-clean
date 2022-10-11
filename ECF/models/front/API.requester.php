<?php
  require_once __DIR__."/../Model.php";
//throw new Exception("pdo->execute($req) failed");
  class APIRequester extends Model {
    public function getDBPartners() {
      $req = "SELECT * FROM partners";
      $stmt = $this->getDB()->prepare($req);
      if ($stmt->execute()) {
        $partners = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $partners;
      } else
        throw new Exception("pdo->execute($req) failed");
    }
    public function getDBPartner($partner_id) {
      $req = "SELECT * FROM partners
                WHERE id_partner = $partner_id";
      $stmt = $this->getDB()->prepare($req);
      if ($stmt->execute()) {
        if ($stmt->rowCount() === 1) {
          $partner = $stmt->fetch(PDO::FETCH_ASSOC);
          $stmt->closeCursor();
          return $partner;
        } else
          throw new Exception("Plusieurs ou aucuns partenaires avec l'id ".$partner_id);
      } else
        throw new Exception("pdo->execute($req) failed");
    }
    public function getDBPartnerPerms($partner_id) {
      $req = "SELECT * FROM perms
                LEFT JOIN partners_auth pa on perms.id_perm = pa.id_perm
                WHERE pa.id_partner = $partner_id";
      $stmt = $this->getDB()->prepare($req);
      if ($stmt->execute()) {
        $perms = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $perms;
      } else
        throw new Exception("pdo->execute($req) failed");
    }
    public function getDBPartnerGyms($partner_id) {
      $req = "SELECT * FROM gyms g
                WHERE g.id_partner = $partner_id";
      $stmt = $this->getDB()->prepare($req);
      if ($stmt->execute()) {
        $gyms = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $gyms;
      } else
        throw new Exception("pdo->execute($req) failed");
    }
    public function getDBPartnerManagers($partner_id) {
      $req = "SELECT m.* FROM managers m
                LEFT JOIN gyms g on m.id_manager = g.id_manager
                RIGHT JOIN partners p on p.id_partner = g.id_partner
                WHERE g.id_partner = $partner_id";
      $stmt = $this->getDB()->prepare($req);
      if ($stmt->execute()) {
        $managers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $managers;
      } else
        throw new Exception("pdo->execute($req) failed");
    }

    public function getDBGyms() {
      $req = "SELECT * FROM gyms";
      $stmt = $this->getDB()->prepare($req);
      if ($stmt->execute()) {
        $gyms = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $gyms;
      } else
        throw new Exception("pdo->execute($req) failed");
    }
    public function getDBGym($id_gym) {
    }
    public function getDBGymPerms($id_gym) {
    }
    public function getDBGymManager($id_gym) {
    }
    public function getDBGymPartner($id_gym) {
    }

    public function getPerms() {
    }
  }