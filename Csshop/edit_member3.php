
<?php include "header.php" ?>

    <main>
      <article>
        <h1>Members</h1>
        <div style="display:flex">
        <?php
        try {
            
            $stmt = $pdo->prepare("UPDATE member SET name=?, address=?, mobile=?, email=? WHERE username=?");
            $stmt->bindParam(1, $_POST["name"]);
            $stmt->bindParam(2, $_POST["address"]);
            $stmt->bindParam(3, $_POST["mobile"]);
            $stmt->bindParam(4, $_POST["email"]);
            $stmt->bindParam(5, $_POST["username"]);
            $stmt->execute();

            
            if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
                $upload_dir = './memberphoto/';  
                $file_extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
                $allowed_extensions = ['jpg', 'jpeg', 'png'];

                
                if (in_array(strtolower($file_extension), $allowed_extensions)) {
                    $username = $_POST["username"];
                    $new_filename = $username . '.' . $file_extension;
                    $destination = $upload_dir . $new_filename;

                    // Delete the old photo 
                    $old_photo = '';
                    $old_photo = $upload_dir . $username ; 
                    
                    unlink($old_photo); 
                    
                
                    
                    if (move_uploaded_file($_FILES['photo']['tmp_name'], $destination)) {
                        echo "Member information updated successfully, including the new photo.";
                        header("location: edit_member.php"); 
                        exit(); 
                    } else {
                        echo "Failed to upload the new photo.";
                    }
                } else {
                    echo "Invalid file type. Only JPG and PNG files are allowed.";
                }
            } else {
                echo "Member information updated successfully, but no new photo uploaded.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
        </div>
        </article>
        <?php include 'footer.php'; ?>