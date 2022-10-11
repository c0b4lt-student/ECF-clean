<?php
require_once __DIR__."/../../models/front/API.requester.php";
//echo "<pre>";
//      print_r($gyms);
//      echo "</pre>";
  class APIController {
    private $requester;

    public function __construct() {
      $this->requester = new APIRequester();
    }

    public function getPartners() {
      $partners = $this->requester->getDBPartners();
      echo "<pre>";
      print_r($partners);
      echo "</pre>";
      return $partners;
    }
    public function getPartner($id_partner) {
      $partner = $this->requester->getDBPartner($id_partner);
      echo "<pre>";
      print_r($partner);
      echo "</pre>";
      return $partner;
    }
    public function getPartnerPerms($id_partner) {
      $perms = $this->requester->getDBPartnerPerms($id_partner);
      echo "<pre>";
      print_r($perms);
      echo "</pre>";
      return $perms;
    }
    public function getPartnerGyms($id_partner) {
      $gyms = $this->requester->getDBPartnerGyms($id_partner);
      echo "<pre>";
      print_r($gyms);
      echo "</pre>";
      return $gyms;
    }
    public function getPartnerManagers($id_partner) {
      $managers = $this->requester->getDBPartnerManagers($id_partner);
      echo "<pre>";
      print_r($managers);
      echo "</pre>";
      return $managers;
    }

    public function getGyms() {
      $gyms = $this->requester->getDBGyms();
      echo "<pre>";
      print_r($gyms);
      echo "</pre>";
    }
    public function getGym($id_gym) {
      $gym = $this->requester->getDBGym($id_gym);
      echo "<pre>";
      print_r($gym);
      echo "</pre>";
    }
    public function getGymPerms($id_gym) {
      $perms = $this->requester->getDBGymPerms($id_gym);
      echo "<pre>";
      print_r($perms);
      echo "</pre>";
    }
    public function getGymManager($id_gym) {
      $manager = $this->requester->getDBGymManager($id_gym);
      echo "<pre>";
      print_r($manager);
      echo "</pre>";
    }
    public function getGymPartner($id_gym) {
      $partner = $this->requester->getDBGymPartner($id_gym);
      echo "<pre>";
      print_r($partner);
      echo "</pre>";
    }

    public function getPerms() {
      $perms = $this->requester->getDBPerms();
      echo "<pre>";
      print_r($perms);
      echo "</pre>";
    }
  }