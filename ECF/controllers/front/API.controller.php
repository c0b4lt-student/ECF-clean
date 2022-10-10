<?php
  class APIController {
    public function getPartners() {
      echo "Envoies des données JSON des partenaires";
    }
    public function getPartner($id_partner) {
      echo "Envois des données JSON du partenaire ".$id_partner;
    }
    public function getPartnerPerms($id_partner) {
      echo "Envois des données JSON des permissions globales du partenaire ".$id_partner;
    }
    public function getPartnerGyms($id_partner) {
      echo "Envois des données JSON des salles du partenaire ".$id_partner;
    }
    public function getPartnerManagers($id_partner) {
      echo "Envois des données JSON des managers du partenaire ".$id_partner;
    }

    public function getGyms() {
      echo "Envois des données JSON des salles";
    }
    public function getGym($id_gym) {
      echo "Envois des données JSON de la salle ".$id_gym;
    }
    public function getGymPerms($id_gym) {
      echo "Envois des données JSON des permissions de la salle ".$id_gym;
    }
    public function getGymManager($id_gym) {
      echo "Envois des données JSON du manager de la salle ".$id_gym;
    }
    public function getGymPartner($id_gym) {
      echo "Envois des données JSON du partenaire de la salle ".$id_gym;
    }

    public function getPerms() {
      echo "Envois des données JSON des permissions";
    }
  }