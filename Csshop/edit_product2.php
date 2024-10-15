
<?php include "header.php" ?>

    <main>
      <article>
        
        <div style="display:flex">
        <?php
    
            $stmt = $pdo->prepare("SELECT * FROM product WHERE pid = ?");
            $stmt->bindParam(1, $_GET["pid"]);
            $stmt->execute();
            $row = $stmt->fetch();

            
            $upload_dir = './propho/';
            $pid = $row['pid'];

            
            $image_path = "";
            if (file_exists($upload_dir . $pid . ".jpg")) {
                $image_path = $upload_dir . $pid . ".jpg";
            } elseif (file_exists($upload_dir . $pid . ".jpeg")) {
                $image_path = $upload_dir . $pid . ".jpeg";
            } elseif (file_exists($upload_dir . $pid . ".png")) {
                $image_path = $upload_dir . $pid . ".png";
            } else {
                $image_path = './propho/default.jpg'; 
            }
        ?>

        <form action="edit_product3.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="pid" value="<?=$row["pid"]?>">
            ชื่อสินค้า: <input type="text" name="pname" value="<?=$row["pname"]?>"><br>
            รายละเอียด: <br>
            <textarea name="pdetail" rows="3" cols="40"><?=$row["pdetail"]?></textarea><br>
            ราคา: <input type="number" name="price" value="<?=$row["price"]?>"><br>
            รูปภาพปัจจุบัน: <br>
            <img src="<?=$image_path?>" alt="Product Photo" width="100"><br><br>
            อัปโหลดรูปภาพใหม่: <input type="file" name="photo" accept="image/*"><br>
            <input type="submit" value="แก้ไขสินค้า">
        </form>
        </div>
        
      </article>
      <?php include 'footer.php'; ?>