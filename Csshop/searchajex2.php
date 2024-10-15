<?php
    include "connect.php";

    $stmt = $pdo->prepare("SELECT * FROM member WHERE name LIKE ?");
    $keyword = "%" . $_GET["keyword"] . "%";
    $stmt->bindParam(1, $keyword);
    $stmt->execute();
?>

    <?php while ($row = $stmt->fetch()): ?>
        <div style="display: inline-block; text-align: left;">
            <b>ชื่อสมาชิก:</b> <?=$row["name"]?><br>
            <b>ที่อยู่:</b> <?=$row["address"]?><br>
            <b>อีเมลล์:</b> <?=$row["email"]?><br>
            <image src='./memberphoto/<?=$row["username"]?>.jpg'><br>
        </div>
        <hr>
    <?php endwhile;  ?>