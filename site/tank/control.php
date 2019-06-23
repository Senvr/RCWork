<html>
<head>
<title>Control Panel</title>
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="stylesheet" href="/assets/css/style.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>//mk3.150
    <script>
    $(document).ready(function(){
        setInterval(function() {
            $("#dist").load("/assets/php/getDist.php");
	    
        }, 150);
    });
    </script>
</head>
<div class="info">
<body background="bgimage.jpg">
<script>
function reload(){
    var container = document.getElementById("feed");
    var content = container.innerHTML;
	document.getElementById("feed").innerHTML="Reloading..";
	
    setTimeout(function(){container.innerHTML= content;},100);
    
   //this line is to watch the result in console , you can remove it later	
    console.log("Refreshed"); 
}
</script>
<div id="feed">
<img style="-webkit-user-select: none;" src="http://192.168.1.8:8081/" width="560" height="420">
</div>
<div id="camcontroll">
<button onclick="reload()">Submit</button><br>Refresh Camera Feed<br><form action="/assets/php/restartcamera.php?restart=true" method="post"><input type="submit"><br>Restart Server<br></button></form>
</div>
<div class="content">
<p>
Distance<div id="dist"></div>

</p>




<div class="footer"><p>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/assets/footer.php');
?>
</p>
</div>
</div>
</body>
</html>