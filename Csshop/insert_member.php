
<?php include "header.php" ?>

    <main>
      <article>
        <h1>Members</h1>
        <div style="display:flex">
        <?php
        try {
            
            $stmt = $pdo->prepare("INSERT INTO member (username, password, name, address, mobile, email) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->bindParam(1, $_POST["username"]);
            $stmt->bindParam(2, $_POST["password"]);
            $stmt->bindParam(3, $_POST["name"]);
            $stmt->bindParam(4, $_POST["address"]);
            $stmt->bindParam(5, $_POST["mobile"]);
            $stmt->bindParam(6, $_POST["email"]);
            $stmt->execute();

            
            $username = $_POST["username"];

            
            if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
                $upload_dir = './memberphoto/';  
                $file_extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
                $allowed_extensions = ['jpg', 'jpeg', 'png'];  

            
                if (in_array(strtolower($file_extension), $allowed_extensions)) {
                    
                    $new_filename = $username . '.' . $file_extension;
                    $destination = $upload_dir . $new_filename;  

                    
                    if (move_uploaded_file($_FILES['photo']['tmp_name'], $destination)) {
                        echo "เพิ่มสมาชิกสำเร็จ username คือ " . $username;
                        echo "<br> รูปภาพถูกอัปโหลดเรียบร้อยแล้ว";
                    } else {
                        echo "มีข้อผิดพลาดในการอัปโหลดรูปภาพ";
                    }
                } else {
                    echo "รูปภาพไม่ถูกต้อง รองรับเฉพาะไฟล์ประเภท JPG หรือ PNG";
                }
            } else {
                echo "เพิ่มสมาชิกสำเร็จ แต่ไม่มีการอัปโหลดรูปภาพ";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
        </div>
        
      </article>
      <?php include 'footer.php'; ?>