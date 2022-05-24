<?php

include "db.php";

if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $query = $connection->conn->prepare("DELETE FROM task WHERE id = '$id'");
  $query->execute();
  $_SESSION["message"] = "Task deleted";
  $_SESSION["message_type"] = "deleted";
  header("Location: index.php");
}