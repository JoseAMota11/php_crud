<?php

include("db.php");

class Save {
  public $title;
  public $description;
  public $connection;

  public function __construct($connection) {
    $this->connection = $connection;
    if (isset($_POST["save"])) {
      $this->title = $_POST["title"];
      $this->description = $_POST["description"];
    }
  }

  public function saveTask() {
    $sql = "INSERT INTO task (title, description) VALUES (:title, :description)";
    $sth = $this->connection->conn->prepare($sql);  
    $sth->bindParam(":title", $this->title);
    $sth->bindParam(":description", $this->description);
    $sth->execute();
    $_SESSION["message"] = "Task saved successfully";
    $_SESSION["message_type"] = "success";
    $this->connection->conn = null;

    if (!$sth) {
      die("Query failed!");
    }

    header("Location: ./index.php");
  }
}

$save = new Save($connection);
$save->saveTask();