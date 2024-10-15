<?php include "../header.php" ?>

    <style>
        article a {
            color: blue;
        }

        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin-top: 20px;
        }

        .product-item {
            width: 200px;
            margin: 15px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }

        .product-item:hover {
            transform: scale(1.05);
        }

        .product-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            margin-bottom: 10px;
        }

        .product-item p {
            font-size: 16px;
            color: #333;
        }

        .product-item form {
            margin-top: 10px;
        }

        .product-item input[type="number"] {
            width: 50px;
            padding: 5px;
            margin-right: 10px;
        }

        .product-item input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 8px 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .product-item input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>

    <main>
        <article>
            <h1>Products</h1>
            <div>
                <?php session_start(); 
                if (!isset($_SESSION['username'])) {
                    // หากยังไม่ได้ล็อกอิน, เปลี่ยนเส้นทางไปยังหน้า login
                    header("Location: login-form.php");
                    exit();
                } 
                ?>
                <?php
                if (!isset($_SESSION['cart'])) {
                    $_SESSION['cart'] = array();
                }
                ?>

                <a href="cart.php?action=">สินค้าในตะกร้า (<?= sizeof($_SESSION['cart']) ?>)</a>
                <div class="product-container">
                    <?php
                    $stmt = $pdo->prepare("SELECT * FROM product");
                    $stmt->execute();
                    while ($row = $stmt->fetch()) {
                    ?>
                        <div class="product-item">
                            <a href="detail.php?pid=<?= $row["pid"] ?>">
                                <img src='../propho/<?= $row["pid"] ?>.jpg' alt="<?= $row["pname"] ?>">
                            </a>
                            <p><?= $row["pname"] ?></p>
                            <p><?= $row["price"] ?> บาท</p>
                            <form method="post" action="cart.php?action=add&pid=<?= $row["pid"] ?>&pname=<?= $row["pname"] ?>&price=<?= $row["price"] ?>">
                                <input type="number" name="qty" value="1" min="1" max="9">
                                <input type="submit" value="ซื้อ">
                            </form>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </article>

        <?php include 'footer.php'; ?>
