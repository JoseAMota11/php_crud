<?php

include "db.php";

if (isset($_GET["id"])) {
  $id = $_GET["id"];
  $query = $connection->conn->prepare("SELECT * FROM task  WHERE id = '$id'");
  $query->execute();

  if ($query) {
    foreach ($query as $result) {
      $title =  $result["title"];
      $description = $result["description"];
    }
  }
}

if (isset($_POST["update"])) {
  $id = $_GET["id"];
  $title = $_POST["title"];
  $description = $_POST["description"];

  $query = $connection->conn->prepare("UPDATE task set title = '$title', description = '$description'  WHERE id = '$id'");
  $query->execute();
  $_SESSION["message"] = "Task updated";
  $_SESSION["message_type"] = "updated";
  header("Location: index.php");
}

?>

<?php include "./includes/header.php"; ?>

<div class="update__container">
  <div class="form__container">
    <form action="./update.php?id=<?php echo $_GET["id"] ?>" method="post" class="form">
      <input type="text" name="title" id="title" placeholder="Title" value="<?php echo $title ?>"/>
      <textarea name="description" id="description" cols="30" rows="5" placeholder="Description"><?php echo $description ?></textarea>
      <button class="btn" name="update" id="update">Update</button>
    </form>
  </div>
</div>

<?php include "./includes/footer.php"; ?>