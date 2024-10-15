<?php include "../header.php" ?>

    <main>
      <article>
        <h1>Workshop7 add member</h1>
        <form action="ws7_2.php" method="post">
            username:<input type="text" name="username"><br>
            password:<input type="text" name="password"><br>
            ชื่อ:<input type="text" name="name"><br>
            ที่อยู่:<textarea name="address" row="3" cols="40"></textarea><br>
            เบอร์โทรศัพท์:<input type="text" name="mobile"><br>
            Email:<input type="text" name="email"><br>
            <input type="submit" value="เพิ่มสมาชิก">
        </form>
      </article>
      <?php include 'footer.php'; ?>