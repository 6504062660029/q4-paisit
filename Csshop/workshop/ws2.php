<?php include "../header.php" ?>


    <main>
      <article>
        <h1>Workshop2</h1>
        <?php 
        $stmt = $pdo->prepare("SELECT * FROM member");
        $stmt->execute();
            
        while($row = $stmt->fetch()){
            echo "ชื่อสมาชิก :" . $row["name"] . "<br>";
            echo "ที่อยู่ :" . $row["address"] . "<br>";
            echo "Email :" . $row["email"] . "<br>";
            echo "<hr>\n";
                
        }
            
            
    ?>  
      </article>
      <?php include 'footer.php'; ?>