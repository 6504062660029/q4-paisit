<?php include "../header.php" ?>


    <main>
      <article>
        <h1>Workshop5</h1>
        <?php
        $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
        $stmt->bindParam(1, $_GET["username"]); 
        $stmt->execute(); 
        $row = $stmt->fetch(); 
        ?>
        <div style="display:flex">
            <div>
                <img src='../memberphoto/<?=$row["username"]?>.jpg' width='200'>
            </div>
            <div style="padding: 15px">
                <h2><?=$row["name"]?></h2>
                ที่อยู่ : <?=$row["address"]?><br>
                เบอร์โทรศัพท์ :<?=$row["mobile"]?><br>
                Email : <?=$row["email"]?> 
            </div>
        </div>
      </article>
      <?php include 'footer.php'; ?>
