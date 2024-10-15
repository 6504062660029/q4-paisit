
<?php include "./header.php" ?>

    <main>
      <article>
        
        <div style="display:flex">
        <?php
        try {
            
            $stmt = $pdo->prepare("UPDATE product SET pname=?, pdetail=?, price=? WHERE pid=?");
            $stmt->bindParam(1, $_POST["pname"]);
            $stmt->bindParam(2, $_POST["pdetail"]);
            $stmt->bindParam(3, $_POST["price"]);
            $stmt->bindParam(4, $_POST["pid"]);
            $stmt->execute();

            
            if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
                $upload_dir = './propho/';  
                $file_extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);
                $allowed_extensions = ['jpg', 'jpeg', 'png'];

                
                if (in_array(strtolower($file_extension), $allowed_extensions)) {
                    $new_filename = $_POST["pid"] . '.' . $file_extension;
                    $destination = $upload_dir . $new_filename;

                    $old_photo = '';
                    $old_photo = $upload_dir . $_POST["pid"]  ; 
                    
                    unlink($old_photo); 
                    
                    if (move_uploaded_file($_FILES['photo']['tmp_name'], $destination)) {
                        echo "Product information updated successfully, including the new photo.";
                        header("Location: edit_product.php"); 
                        exit(); 
                    } else {
                        echo "Failed to upload the new photo.";
                    }
                } else {
                    echo "Invalid file type. Only JPG and PNG files are allowed.";
                }
            } else {
                echo "Product information updated successfull, but no new photo uploaded.";
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
        </div>
        
      </article>
      <?php include 'footer.php'; ?>