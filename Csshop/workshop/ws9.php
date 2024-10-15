<?php include "../header.php" ?>

    <main>
      <article>
        <h1>Workshop9</h1>
        <?php
            $stmt = $pdo->prepare("SELECT * FROM member");
            $stmt->execute();
            

            while ($row = $stmt->fetch()) {
                echo "<div>";
                echo "<img src='../memberphoto/" . $row["username"] . ".jpg' width=100> <br>" ;
                echo "ชื่อสมาชิก : " . $row ["name"] . "<br>";
                echo "ที่อยู่ : " . $row ["address"] . "<br>";
                echo "เบอร์โทรศัพท์ : " . $row ["mobile"] . "<br>";
                echo "อีเมล์ : " . $row ["email"] . "<br>";
                echo "<a href='ws9_2.php?username=" . $row["username"] . "'>แก้ไข</a> | ";
                echo "<a href='#' onclick='confirmDelete(\"" . $row["username"] . "\")'>ลบ</a>";
                echo "</div>\n";
                echo "<hr>\n";

                
                

            }
        ?>
      </article>
      <?php include 'footer.php'; ?>
      