<?php include '../Csshop/connect.php'; ?>
<!doctype html>
<html lang="en">


  <head>
    <meta charset="utf-8">
    <title>CS Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="../Csshop/mcss.css" rel="stylesheet" type="text/css" />
    <script src="../Csshop/mpage.js"></script>
  </head>

  <body>

    <header>
      <div class="logo">
        <img src="../Csshop/cslogo.jpg" width="200" alt="Site Logo">
      </div>
      <div class="search">
        <form>
          <input type="search" placeholder="Search the site...">
          <button>Search</button>
        </form>
        
      </div>
    </header>

    <div class="mobile_bar">
      <a href="#"><img src="../Csshop/responsive-demo-home.gif" alt="Home"></a>
      <a href="#" onClick='toggle_visibility("menu"); return false;'><img src="../Csshop/responsive-demo-menu.gif" alt="Menu"></a>
    </div>

    <main>
    <article>
        <h2>Login</h2>
        <form action="checklogin.php" method="POST">
        <label for="std_id">Student ID:</label>
        <input type="text" name="std_id" placeholder="Enter Student ID" required>
        <input type="submit" value="Login">
        </form>
        </body>

     
    </article>
    <nav id="menu">
        <h2>Navigation</h2>
        <ul class="menu">
          <li class="dead"><a href="../Csshop/index.php">Home</a></li>
                        <li><a href="../Csshop/display_product.php">All Products</a></li>
                        <li><a href="../Csshop/table_product.php">Table of All Products</a></li>
                        <li><a href="../Csshop/cart/store.php">Buy Products</a></li>
                        <li><a href="../Csshop/cart/cart.php">Cart</a></li>
                        <li><a href="../Csshop/member.php">All Member</a></li>
                        <li><a href="../Csshop/insert_product.html">Insert Products</a></li>
                        <li><a href="../Csshop/insert_member.html">Insert Member</a></li>
                        <li><a href="../Csshop/edit_member.php">Delete/edit Member</a></li>
                        <li><a href="../Csshop/edit_product.php">Delete/edit product</a></li>
                        <li><a href="../Csshop/hospital.php">Hospitlal</a></li>
                        <li><a href="../Csshop/registry.php">Registry</a></li>
                        <li><a href="../Csshop/searchajex1.php">SearchAjax</a></li>
                        <li><a href="../Csshop/lab7.php">Lab7</a></li>
                        <li><a href="./test3.php">test3</a></li>
                        <li><a href="./test2.php">test2</a></li>
                        
        </ul>
      </nav>
      <aside>
        <h2>Aside</h2>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed blandit libero sit amet nunc ultricies, eu feugiat diam placerat. Phasellus tincidunt nisi et lectus pulvinar, quis tincidunt lacus viverra. Phasellus in aliquet massa. Integer iaculis massa id dolor venenatis scelerisque.
          <br><br>
        </p>
      </aside>
    </main>
    <footer>
      <a href="#">Sitemap</a>
      <a href="#">Contact</a>
      <a href="#">Privacy</a>
    </footer>
  </body>
</html>
