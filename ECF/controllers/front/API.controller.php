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
  }