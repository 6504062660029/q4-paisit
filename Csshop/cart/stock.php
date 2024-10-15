
<?php include "../header.php" ?>

    <style>
      article a {
        color: blue;
      }
      table {
        margin: auto;
        margin-top: 20px;
      }
      .btc {
        position: relative;
        bottom: 300px;
      }
    </style>
 
    <main>
      <article>
        <h1>รายละเอียดสินค้า</h1>
        <div >
		<?php session_start(); 
	
            if (!isset($_SESSION['username'])) {
                // หากยังไม่ได้ล็อกอิน, เปลี่ยนเส้นทางไปยังหน้า login
                header("Location: login-form.php");
                exit();
            }
            
            // ดึงชื่อผู้ใช้ที่ล็อกอิน
            $username = $_SESSION['username'];
            
            // ตรวจสอบสิทธิ์ของผู้ใช้
            $stmt = $pdo->prepare("SELECT type FROM member WHERE username = :username");
            $stmt->execute(['username' => $username]);
            $user = $stmt->fetch();
            
            // หากผู้ใช้ไม่ใช่ admin ให้เปลี่ยนเส้นทางไปยังหน้าอื่น
            if ($user['type'] != 'admin') {
                echo "คุณไม่มีสิทธิ์เข้าถึงหน้านี้";
                exit();
            }
            
            // ดึงข้อมูลสินค้าทั้งหมดจากฐานข้อมูล
            $stmt = $pdo->prepare("SELECT pid, pname, price, stock FROM product");
            $stmt->execute();
            $products = $stmt->fetchAll();
		?>
        
        <div>
         
            <h2>สินค้าคงเหลือ</h2>
            <table border="1">
                <tr>
                    <th>รหัสสินค้า</th>
                    <th>ชื่อสินค้า</th>
                    <th>ราคา</th>
                    <th>จำนวนคงเหลือ</th>
                </tr>
                <?php if (count($products) > 0): ?>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?= htmlspecialchars($product['pid']) ?></td>
                            <td><?= htmlspecialchars($product['pname']) ?></td>
                            <td><?= htmlspecialchars($product['price']) ?> บาท</td>
                            <td><?= htmlspecialchars($product['stock']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">ไม่มีข้อมูลสินค้า</td>
                    </tr>
                <?php endif; ?>
            </table>

            <a class="btc" href="./cart.php">กลับไปที่หน้า Cart</a>
        </div>
		
        
      </article>
      <?php include 'footer.php'; ?>









