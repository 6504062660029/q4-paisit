<?php include "../header.php" ?>

    <main>
      <article>
        <h1>Workshop9</h1>
        <?php

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                $stmt = $pdo->prepare("UPDATE member SET name=?,address=?,mobile=?,email=? WHERE username=?");
                $stmt->bindParam(1,$_POST["name"]);
                $stmt->bindParam(2,$_POST["address"]);
                $stmt->bindParam(3,$_POST["mobile"]);
                $stmt->bindParam(4,$_POST["email"]);
                $stmt->bindParam(5,$_POST["username"]);
                
            
                if($stmt->execute()){
            
                    echo "แก้ไขสมาชิก" . $_POST["username"] . "สำเร็จ";
                }  else {
                    echo "เกิดข้อผิดพลาดในการแก้ไขสมาชิก";
                }
            }
        ?>
      </article>
      <?php include 'footer.php'; ?>