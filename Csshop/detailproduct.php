<?php include 'header.php'; ?>
<style>
        body {
            font-family: Arial, sans-serif;
        }

        .product-details {
            display: flex;
            justify-content: space-between;
            padding: 20px;
            background-color: #f9f9f9;
            margin: 20px auto;
            width: 80%;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .product-image img {
            max-width: 300px;
            border-radius: 8px;
        }

        .product-info {
            max-width: 60%;
        }

        .product-info h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 15px;
        }

        .product-info p {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .product-info p strong {
            color: #4CAF50;
        }

        .product-info .price {
            font-size: 20px;
            font-weight: bold;
            color: #e74c3c;
        }

        .back-link {
            display: block;
            margin: 20px 0;
            text-decoration: none;
            font-size: 16px;
            color: #007BFF;
            transition: color 0.3s;
        }

        .back-link:hover {
            color: #0056b3;
        }
    </style>
     <main>
        <article>
            <?php
            if (isset($_GET['pid'])) {
                $stmt = $pdo->prepare("SELECT * FROM product WHERE pid = ?");
                $stmt->bindParam(1, $_GET['pid']);
                $stmt->execute();
                $row = $stmt->fetch();
            }
            ?>

            <?php if ($row): ?>
                <div class="product-details">
                    <div class="product-image">
                        <?php
                        $image_extensions = ['jpg', 'jpeg', 'png'];
                        $image_found = false;
                        foreach ($image_extensions as $ext) {
                            if (file_exists("./propho/{$row['pid']}.$ext")) {
                                echo "<img src='./propho/{$row['pid']}.$ext' alt='Product Image'>";
                                $image_found = true;
                                break;
                            }
                        }
                        if (!$image_found) {
                            echo "<img src='./propho/default.png' alt='Default Product Image'>";
                        }
                        ?>
                    </div>

                    <div class="product-info">
                        <h2>Product Details</h2>
                        <p><strong>Product Name:</strong> <?= htmlspecialchars($row["pname"]) ?></p>
                        <p><strong>Description:</strong> <?= htmlspecialchars($row["pdetail"]) ?></p>
                        <p class="price">Price: <?= htmlspecialchars($row["price"]) ?> บาท</p>
                    </div>
                </div>
            <?php else: ?>
                <p>Product details not found.</p>
            <?php endif; ?>

            <a href="./display_product.php" class="back-link">&lt; Back to Products</a>
        </article>
        <?php include 'footer.php'; ?>