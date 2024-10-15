<?php include 'header.php'; ?>


<style>
          .input-label {
            display: flex;
            margin-right: 50px;
            justify-content: center;
            margin-top: 20px;
            margin-bottom: 20px;
          }
          label {
            width: 100px;
            text-align: left;
          }
          div>input {
            width: 180px;
          }

          .thinking {
            background: white url("img/checking.gif") no-repeat;
            background-position: 150px 1px;
          }

          .approved {
            background: white url("img/true.gif") no-repeat;
            background-position: 150px 1px;
          }

          .denied {
            background: #FF8282 url("img/false.gif") no-repeat;
            background-position: 150px 1px;
          }
    </style>

    <script>
      var xmlHttp;

      function checkUsername(){
        document.getElementById("username").className = "thinking";

        xmlHttp = new XMLHttpRequest();
        xmlHttp.onreadystatechange = showUsernameStatus;

        var username = document.getElementById("username").value;
        var url = "checkuser.php?username=" + username;
        xmlHttp.open("GET", url);
        xmlHttp.send();
      }

      function showUsernameStatus(){
        if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
          if (xmlHttp.responseText == "okay"){
            document.getElementById("username").className = "approved";
          }
          else {
            document.getElementById("username").className = "denied";
            document.getElementById("username").focus();
            document.getElementById("username").select();
          }
        }
        
      }
    </script>

   
    <main>
      <article style="text-align: center;">
            <h1>Add New Member</h1>
            <form action="insert_member.php" method="post" enctype="multipart/form-data">
              
              <div class="input-label">
                <label>username : </label>
                <input type="text" name="username" id="username" required onblur="checkUsername()"><br>
              </div>

              <div class="input-label">
                <label>password :</label>
                <input type="password" name="password" required>
              </div>

              <div class="input-label">
                <label>ชื่อสมาชิก :</label>
                <input type="text" name="mname" required>
              </div>

              <div class="input-label">
                <label>ที่อยู่ :</label>
                <input type="text" name="address" required>
              </div>

              <div class="input-label">
                <label>เบอร์โทร :</label>
                <input type="text" name="mobile" pattern="[0-9]+" required>
              </div>

              <div class="input-label">
                <label>อีเมลล์ :</label>
                <input type="email" name="email" required>
              </div>

              <div class="input-label">
                <label>รูปภาพ :</label>
                <input type="file" name="profile_pic" required>
              </div>
                
              <input type="submit" value="เพิ่มสมาชิก">
            </form>
      </article>
      
<?php include 'footer.php'; ?>