<?php include("db.php"); ?>

<?php include("./includes/header.php"); ?>

<div class="container">
  <div class="left-side">
    <?php if (isset($_SESSION["message"])) { ?>
      <!-- Alert using JS -->
      <script>
        const container = document.querySelector(".left-side")
        const divAlert = document.createElement("div")
        divAlert.className = "<?= $_SESSION["message_type"] ?>"
        const p = document.createElement("p")
        p.textContent = "<?= $_SESSION["message"] ?>"
        const icon = document.createElement("i")
        icon.className = "fa-solid fa-xmark icon-delete"
        icon.addEventListener("click", (e) => {
          e.srcElement.parentElement.remove()
        })
        divAlert.append(p, icon)
        container.prepend(divAlert)
      </script>
    <?php session_unset(); } ?>
    <div class="form__container">
      <form action="./save.php" method="post" class="form">
        <input type="text" name="title" id="title" placeholder="Title" required />
        <textarea name="description" id="description" cols="30" rows="5" placeholder="Description" required></textarea>
        <button class="btn" name="save" id="save">Save</button>
      </form>
    </div>
  </div>
  <div class="table__container">
    <div class="table">
      <span class="grid">Title</span>
      <span class="grid">Description</span>
      <span class="grid">Created at</span>
      <span class="grid">Actions</span>
    </div>
    <div class="content">
      <?php
        $query = $connection->conn->prepare("SELECT * FROM task");
        $query->execute();
        foreach ($query as $result) { ?>
        <div class="query__result"> 
          <span class="grid"><?php echo $result["title"] ?></span> 
          <span class="grid"><?php echo $result["description"] ?></span> 
          <span class="grid"><?php echo $result["created_at"] ?></span>
          <span class="grid grid__result">
            <a href="./update.php?id=<?php echo $result["id"] ?>"><i class="fa-solid fa-pen-to-square icon-edit"></i></a>
            <a href="./delete.php?id=<?php echo $result["id"] ?>"><i class="fa-solid fa-xmark icon-delete"></i></a>
          </span>
        </div>
      <?php } ?> 
    </div>
  </div>
</div>

<?php include("./includes/footer.php"); ?>