<?php include 'header.php'; ?>
<link rel="stylesheet" href="check.css">
    
  <script>
    var request;
    function send() {
      request = new XMLHttpRequest();
      request.onreadystatechange = showResult;

      var keyword = document.getElementById("keyword").value;
      var url = "searchajax2.php?keyword=" + keyword;

      request.open("GET", url, true);
      request.send(null);
    }

    function showResult(){
      if (request.readyState == 4 && request.status == 200) {
        document.getElementById("result").innerHTML = request.responseText;
      }
    }
  </script>
  
  <main>
      <article style="text-align: center;">
        <form style="margin: 50px 0px">
            <label>ชื่อสมาชิก:</label>
            <input type="text" name="keyword" id="keyword" onkeyup="send()">
        </form>

        <div id="result"></div>
      </article>
      
<?php include 'footer.php'; ?>