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
    <article style="padding: 100px 160px 100px;">
        <h2>จำแนกรายชื่อโรงพยาบาลเอกชน</h2>

        <!-- Dropdown for selecting hospital size -->
        <label for="hospital-size-select">เลือกขนาดโรงพยาบาล: </label>
        <select id="hospital-size-select" onchange="displayHospitals()">
            <option value="large">โรงพยาบาลขนาดใหญ่</option>
            <option value="medium">โรงพยาบาลขนาดกลาง</option>
            <option value="small">โรงพยาบาลขนาดเล็ก</option>
        </select>

        <!-- Hospital table, initially hidden -->
        <div id="hospital-table-container" style="display:none; margin-top: 20px;">
            <table id="hospital-table" border="1" cellpadding="5" cellspacing="0" style="width:100%; text-align: center;">
                <thead>
                    <tr>
                        <th>ที่</th>
                        <th>ชื่อโรงพยาบาล</th>
                        <th>จำนวนเตียง</th>
                    </tr>
                </thead>
                <tbody></tbody> <!-- The rows will be inserted dynamically -->
            </table>
        </div>

        <script>
            let hospitalData = [];  // Store fetched hospital data

            async function getDataFromAPI() {
                try {
                    let response = await fetch('http://202.44.40.193/~aws/JSON/priv_hos.json');
                    let rawData = await response.text();
                    let objectData = JSON.parse(rawData);

                    hospitalData = objectData.features.map((feature, index) => ({
                        index: index + 1,  // Add index (starting from 1)
                        name: feature.properties.name,
                        numBeds: feature.properties.num_bed
                    }));
                } catch (error) {
                    console.error('Error fetching or processing data:', error);
                }
            }

            function displayHospitals() {
                // Get the selected dropdown value
                let selectedValue = document.getElementById('hospital-size-select').value;
                let tableContainer = document.getElementById('hospital-table-container');
                let tbody = document.getElementById('hospital-table').getElementsByTagName('tbody')[0];

                // Clear any existing rows in the table body
                tbody.innerHTML = '';

                // Filter and add the corresponding hospital data based on the selection
                let filteredData = hospitalData.filter(hospital => {
                    if (selectedValue === 'large') {
                        return hospital.numBeds >= 91;
                    } else if (selectedValue === 'medium') {
                        return hospital.numBeds >= 31 && hospital.numBeds <= 90;
                    } else if (selectedValue === 'small') {
                        return hospital.numBeds <= 30;
                    }
                });

                // Loop through filtered data and add rows to the table
                filteredData.forEach(hospital => {
                    let row = tbody.insertRow();
                    let cellIndex = row.insertCell(0);
                    let cellName = row.insertCell(1);
                    let cellBeds = row.insertCell(2);

                    cellIndex.innerHTML = hospital.index;
                    cellName.innerHTML = hospital.name;
                    cellBeds.innerHTML = hospital.numBeds;
                });

                // Display the table container if data exists
                tableContainer.style.display = filteredData.length > 0 ? 'block' : 'none';
            }

            // Fetch and display hospital data when the page loads
            getDataFromAPI();
        </script>
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
