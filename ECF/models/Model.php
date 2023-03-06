<?php
// classe abstraite qui instencie un seul pdo et le retourne
abstract class  Model {
  private static $pdo;

  private static function connectDB() {
    self::$pdo = new PDO('pgsql:host=ec2-54-80-123-146.compute-1.amazonaws.com;port=5432;dbname=dcei00rnh680m4;user=zwdocmtikopoey;password=c1cb72303a61470907954cf328500a1a52d506c52f0ac16a7be0bff7544fb40e');
    self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  }

  protected function getDB() {
    if (self::$pdo === null)
      self::connectDB();
    return self::$pdo;
  }

  public static function sendJSON($data) {
    header("Access-Control-Allow-Origin: *");//Remplacer l'etoile une fois en production
    header("Content-Type: application/json");
    echo json_encode($data);
  }
}