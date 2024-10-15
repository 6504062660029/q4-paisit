
<?php include "header.php" ?>

    <main>
      <article>
        <h1>Products</h1>
        <div >
        <?php
            $stmt = $pdo->prepare("SELECT * FROM product");
            $stmt->execute();

            
            

            while ($row = $stmt->fetch()) {
                echo "<div>";
                echo "<img src='./propho/" . $row["pid"] . "' width=100> <br>" ;
                echo "ชื่อ : " . $row ["pname"] . "<br>";
                echo "รายละเอียด : " . $row ["pdetail"] . "<br>";
                echo "ราคา : " . $row ["price"] . "<br>";
                echo "<a href='edit_product2.php?pid=" . $row["pid"] . "'>แก้ไข</a> | ";
                echo "<a href='#' onclick='confirmDelete(\"" . $row["pid"] . "\")'>ลบ</a>";
                echo "</div>\n";
                echo "<hr>\n";

                
                

            }
        ?>
            </div>
        
      </article>
      <?php include 'footer.php'; ?>