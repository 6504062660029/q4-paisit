
<?php include "header.php" ?>

    <main>
      <article>
      <?php
try {
    
    $stmt = $pdo->prepare("INSERT INTO product (pname, pdetail, price) VALUES (?, ?, ?)");

    
    $stmt->bindParam(1, $_POST["pname"]);
    $stmt->bindParam(2, $_POST["pdetail"]);
    $stmt->bindParam(3, $_POST["price"]);

   
    $stmt->execute();

    
    $pid = $pdo->lastInsertId();

    
    if (isset($_FILES['pimage']) && $_FILES['pimage']['error'] == 0) {
        
        $upload_dir = './propho/';  
        $file_extension = pathinfo($_FILES['pimage']['name'], PATHINFO_EXTENSION);
        $allowed_extensions = ['jpg','jpeg','png'];

        if(in_array($file_extension,$allowed_extensions)){

            $new_filename = $pid . '.' . $file_extension;
            $destination = $upload_dir . $new_filename;

            if (move_uploaded_file($_FILES['pimage']['tmp_name'], $destination)) {
                echo "File uploaded successfully.";
            } else {
                echo "Failed to upload file.";
            }
        } else {
            echo "Invalid file type. Only JPG and PNG files are allowed.";
        }
        

        

        
    }

    
    header("Location: display_products.php");
} catch (PDOException $e) {
    
    echo "Error: " . $e->getMessage();
}
?>

       
      </article>
     
      <?php include 'footer.php'; ?>