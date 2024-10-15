<?php include "../header.php" ?>

    <main>
      <article>
        <h1>Workshop1</h1>
        <table>

        <?php 
            $stmt = $pdo->prepare("SELECT * FROM product");
            $stmt->execute();
            echo "<tr>\n";
            echo "<th> รหัสสินค้า </th>";
            echo "<th> ซื้อสินค้า </th>";
            echo "<th> รายละเอียดสินค้า </th>";
            echo "<th> ราคา </th>";
            echo "</tr>\n";
            while($row = $stmt->fetch()){
                echo "<tr>\n";
                echo "<td>" . $row["pid"] . "</td>";
                echo "<td>" . $row["pname"] . "</td>";
                echo "<td>" . $row["pdetail"] . "</td>";
                echo "<td>" . $row["price"] . "</td>";
                echo "</tr>\n";
            }
            
            
        ?>
        
        </table>    
      </article>
      <?php include 'footer.php'; ?>