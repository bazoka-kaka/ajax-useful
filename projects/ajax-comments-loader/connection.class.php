<?php

class Connection
{
  public $pdo;

  function __construct()
  {
    $host = "localhost";
    $dbname = "test";
    $user = "root";
    $pass = "";

    try {
      $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
      $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      echo "Error: " . $e->getMessage();
    }
  }
}
