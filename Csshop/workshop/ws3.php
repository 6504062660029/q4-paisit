<?php include "../header.php" ?>


    <main>
      <article>
        <h1>Workshop3</h1>
        <?php 
        $stmt = $pdo->prepare("SELECT * FROM member");
        $stmt->execute();
            
        while($row = $stmt->fetch()){
            echo "ชื่อสมาชิก :" . $row["name"] . "<br>";
            echo "ที่อยู่ :" . $row["address"] . "<br>";
            echo "Email :" . $row["email"] . "<br>";
            echo "<div>\n";
            echo "<img src='../memberphoto/" . $row["username"] . ".jpg' width=100> <br>" ;
            echo "</div>\n";
            echo "<hr>\n";
            

                
        }
            
            
    ?>
      </article>
      <?php include 'footer.php'; ?>