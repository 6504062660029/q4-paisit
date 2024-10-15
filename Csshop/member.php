<?php include "header.php" ?>

    <style>
        .member-card {
            padding: 15px;
            text-align: center;
        }

        .member-card img {
            width: 150px;
            height: 150px;
            object-fit: cover; /* Ensures images are not stretched */
            border-radius: 0; /* No circular shape */
        }

        .member-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .member-card a {
            text-decoration: none;
            color: black;
        }

        .member-card:hover {
            transform: scale(1.05);
            transition: 0.3s ease;
        }
    </style>

<main>
    <article>
        <h1>Members</h1>
        <div class="member-container">
        <?php
            $stmt = $pdo->prepare("SELECT * FROM member");
            $stmt->execute();

            $extensions = ['jpg','png','jpeg'];
        ?>
        <?php while ($row = $stmt->fetch()) : 
            $imagePath = '';
            foreach ($extensions as $ext){
                if(file_exists("./memberphoto/{$row['username']}.$ext")){
                    $imagePath = "./memberphoto/{$row['username']}.$ext";
                    break;
                }
            }
        ?>
            <div class="member-card">
                <a href="memberdetail.php?username=<?=$row['username']?>">
                    <img src="<?=$imagePath?>" alt="Photo of <?=$row['name']?>">
                    <p><?=$row['name']?></p>
                </a>
            </div>
        <?php endwhile; ?>
        </div>
    </article>
    <?php include 'footer.php'; ?>