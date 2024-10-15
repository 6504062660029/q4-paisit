<?php include "../header.php" ?>

    <main>
      <article>
        <h1>Workshop7 add member</h1>
        <?php 
            $stmt = $pdo->prepare("INSERT INTO member  VALUES (?,?,?,?,?,?)");
            $stmt->bindParam(1,$_POST["username"]);
            $stmt->bindParam(2,$_POST["password"]);
            $stmt->bindParam(3,$_POST["name"]);
            $stmt->bindParam(4,$_POST["address"]);
            $stmt->bindParam(5,$_POST["mobile"]);
            $stmt->bindParam(6,$_POST["email"]);
            $stmt->execute();

            $username = $_POST["username"];


        ?>
        <div>
        เพิ่มสมาชิกสำเร็จ username คือ <?=$username?>
        </div>
      </article>
      <nav id="menu">
        <h2>Navigation</h2>
        <?php include 'footer.php'; ?>
        












