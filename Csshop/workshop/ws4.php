<?php include "../header.php" ?>

    <main>
      <article>
        <h1>Workshop4_searchMember</h1>
        <form>
    <input type="text" name="keyword">
    <input type="submit" value="ค้นหา">
</form>
    <div style="display:flex">
    <?php
        $stmt = $pdo->prepare("SELECT * FROM member WHERE name LIKE ?");

        if (!empty($_GET)) 
            $value = '%' . $_GET["keyword"] . '%'; 
        $stmt->bindParam(1, $value); 
        $stmt->execute(); // เริ่มค ้นหา
    ?>
    <?php while ($row = $stmt->fetch()) : ?>
        <div style="padding: 15px; text-align: center">
            <img src='../memberphoto/<?=$row["username"]?>.jpg' width='100'><br>
            <?=$row ["name"]?><br>
        </div>
    <?php endwhile; ?>
    </div>
    <?php include 'footer.php'; ?>