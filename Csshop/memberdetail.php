
<?php include "header.php" ?>

    <style>
      .flex-container {
        display: flex;
        margin: 10px;
        padding: 10px;
      }
      .text-details{
        margin: 10px;
      }
    </style>
 
    <main>
      <article>
        
        <?php
        if (isset($_GET['username'])) {
            $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
            $stmt->bindParam(1, $_GET['username']);
            $stmt->execute();
            $row = $stmt->fetch();
        }
        ?>

        <?php if ($row): ?>
          <div class="flex-container">
            <div class="image-container">
                <?php
                $image_extensions = ['jpg', 'jpeg', 'png'];
                foreach ($image_extensions as $ext) {
                    if (file_exists("./memberphoto/{$row['username']}.$ext")) {
                        echo "<img src='./memberphoto/{$row['username']}.$ext' width='200'>";
                        break;
                    }
                }
                ?>
            </div>
            <div class="text-details">
                <h2>รายละเอียด</h2>
                ชื่อ: <?=$row["name"]?><br>
                ที่อยู่: <?=$row["address"]?><br>
                เบอร์โทรศัพท์: <?=$row["mobile"]?> <br>
                Email: <?=$row["email"]?> <br>
            </div>

        </div>
        <?php else: ?>
            <p>ไม่พบรายละเอียดสินค้า</p>
        <?php endif; ?>
      </article>
      <?php include 'footer.php'; ?>