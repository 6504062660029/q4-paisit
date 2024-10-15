<?php include 'header.php'; ?>
<style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
            color: #333;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td {
            color: #555;
        }

        th, td {
            border-radius: 4px;
        }
    </style>
    <main>
      <article>
        <table>
        <tr>
            <th>รหัสสินค้า</th>
            <th>ชื่อสินค้า</th>
            <th>รายละเอียดสินค้า</th>
            <th>ราคา</th>
        </tr>
        <?php
        $stmt = $pdo->prepare("SELECT * FROM product ORDER BY pid ASC");
        $stmt->execute();
        while ($row = $stmt->fetch()) :
        ?>
            <tr>
                <td><?php echo $row["pid"] ?></td>
                <td><?php echo $row["pname"] ?></td>
                <td><?php echo $row["pdetail"] ?></td>
                <td><?php echo $row["price"] ?> บาท</td>
            </tr>

        <?php endwhile ?>
    </table>
      </article>
      <?php include 'footer.php'; ?>
      