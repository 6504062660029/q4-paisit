<?php
include "../Csshop/connect.php"; 

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Prepare the SQL statement to check for the student ID
    $stmt = $pdo->prepare("SELECT * FROM student WHERE std_id = ?");
    $stmt->bindParam(1, $_POST["std_id"]);
    $stmt->execute();
    
    // Fetch the student's details
    $row = $stmt->fetch();

    // If the student ID is found in the database
    if (!empty($row)) {
        // Store student ID and name in session
        $_SESSION["std_id"] = $row["std_id"];   // Store student ID
        $_SESSION["std_name"] = $row["std_name"];   // Store the name

        // Display a success message along with the student ID and name
        echo "เข้าสู่ระบบสำเร็จ<br>";
        echo "Student ID: " . $_SESSION["std_id"] . "<br>";
        echo "Name: " . $_SESSION["std_name"];
    } else {
        // If the student ID is not found, display an error message
        echo "ไม่สำเร็จ: รหัสนักเรียนไม่ถูกต้อง<br>";
        echo "<a href='./loginform.php'>เข้าสู่ระบบอีกครั้ง</a>"; 
    }
}
?>
