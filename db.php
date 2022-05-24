<?php

class Connection {
  public $server = "localhost";
  public $user = "root";
  public $password = "";
  public $conn;

  public function __construct() {

    session_start();

    $options = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_CASE => PDO::CASE_NATURAL,
      PDO::ATTR_ORACLE_NULLS => PDO::NULL_EMPTY_STRING,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    try {
      $this->conn = new PDO("mysql:host=$this->server;dbname=php_crud;port=3307", $this->user, $this->password, $options);
    } catch (PDOException $error) {
      die("Database connection failed: " . $error->getMessage());
    }
  }
}

$connection = new Connection();