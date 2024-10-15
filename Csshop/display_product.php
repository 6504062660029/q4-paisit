
<?php include 'header.php'; ?>
<style>
        .product-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
        }

        .product-card {
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 10px;
            width: 200px;
            margin: 15px;
            text-align: center;
            padding: 15px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .product-card img {
            width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .product-details h3 {
            margin: 10px 0;
            color: #333;
            font-size: 1.1em;
        }

        .product-details p {
            font-size: 1em;
            color: #007bff;
        }
    </style>
    <main>
      <article>
        <h1>Products</h1>
        <div class="product-container">
        <?php
            $stmt = $pdo->prepare("SELECT * FROM product");
            $stmt->execute();

            $extensions = ['jpg','png','jpeg'];
        ?>
        <?php while ($row = $stmt->fetch()) : 
            
            $imagePath = '';

            foreach ($extensions as $ext){
                if(file_exists("./propho/{$row['pid']}.$ext")){
                    $imagePath = "./propho/{$row['pid']}.$ext";
                    break;
                }
            }

            if($imagePath == ''){
                $imagePath = "./propho/default-image.jpg";
            }
        ?>
            <div class="product-card">
                <a href="detailproduct.php?pid=<?=$row["pid"]?>">
                    <img src="<?=$imagePath?>" alt="<?=$row['pname']?>">
                </a>
                <div class="product-details">
                    <h3><?=$row["pname"]?></h3>
                    <p><?=$row["price"]?> บาท</p>
                </div>
            </div>
        <?php endwhile; ?>
        </div>

        </article>
<?php include 'footer.php'; ?>