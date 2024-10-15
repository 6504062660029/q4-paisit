
<?php include "header.php" ?>

    <main>
      <article>
        
        <div style="display:flex">
        <?php
            $stmt = $pdo->prepare("SELECT * FROM member WHERE username = ?");
            $stmt->bindParam(1,$_GET["username"]);
            $stmt->execute();
            $row = $stmt->fetch();

            $upload_dir = './memberphoto/';
            $username = $row['username'];

            
            $image_path = "";
            if (file_exists($upload_dir . $username . ".jpg")) {
                $image_path = $upload_dir . $username . ".jpg";
            } elseif (file_exists($upload_dir . $username . ".jpeg")) {
                $image_path = $upload_dir . $username . ".jpeg";
            } elseif (file_exists($upload_dir . $username . ".png")) {
                $image_path = $upload_dir . $username . ".png";
            }
        ?>

        <form action="edit_member3.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="username" value="<?=$row["username"]?>">
            ชื่อ:<input type="text" name="name" value="<?=$row["name"]?>"><br>
            ที่อยู่:<br>
            <textarea name="address" rows="3" cols="40"><?=$row["address"]?></textarea><br>
            เบอร์โทรศัพท์:<input type="text" name="mobile" value="<?=$row["mobile"]?>"><br>
            Email:<input type="text" name="email" value="<?=$row["email"]?>"><br>
            รูปภาพปัจจุบัน:<br>
            <img src="<?=$image_path?>" alt="Member Photo" width="100"><br><br>
            อัปโหลดรูปภาพใหม่: <input type="file" name="photo" accept="image/*"><br>
            <input type="submit" value="แก้ไขสมาชิก">
        </form>
        </div>
        </article>
        <?php include 'footer.php'; ?>