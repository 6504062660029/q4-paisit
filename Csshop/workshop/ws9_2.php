<?php include "../header.php" ?>

    <main>
      <article>
        <h1>Workshop9</h1>
        <?php
            $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
            $stmt->bindParam(1,$_GET["username"]);
            $stmt->execute();
            $row = $stmt->fetch();
        ?>
        <form action="ws9_3.php" method="post">
            <input type="hidden" name="username" value="<?=$row["username"]?>">
            ชื่อ:<input type="text" name="name" value="<?=$row["name"]?>"><br>
            ที่อยู่:<br>
            <textarea name="address" rows="3" cols="40"><?=$row["address"]?></textarea><br>
            เบอร์โทรศัพท์:<input type="text" name="mobile" value="<?=$row["mobile"]?>"><br>
            Email:<input type="text" name="email" value="<?=$row["email"]?>"><br>
            <input type="submit" value="แก้ไขสมาชิก">
        </form>
      </article>
      <?php include 'footer.php'; ?>