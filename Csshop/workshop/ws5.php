<?php include "../header.php" ?>

    <main>
      <article>
        <h1>Workshop5</h1>
        <div style="display:flex">

        <?php
        $stmt = $pdo->prepare("SELECT * FROM member");
        $stmt->execute();
        ?>
        <?php while ($row = $stmt->fetch()) : ?>
            <div style="padding: 15px; text-align: center">
            <a href="ws5_2.php?username=<?=$row["username"]?>">
                <img src='../memberphoto/<?=$row["username"]?>.jpg' width='100'>
            </a><br>
            <?=$row ["name"]?>
            </div>
        <?php endwhile; ?>
            
            
    
    </div>
      </article>
      <?php include 'footer.php'; ?>