<html>
<head>
<meta name="control" content="width=device-width, initial-scale=1.0">
<style>
img {
  width: 100%;
  height: auto;
}
.button0 {
  background-color: #630000;
  border: none;
  color: white;
  padding: 5px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border: 2px solid black;
  border-radius: 5px;
}
.button1 {
  background-color: #006300;
  border: none;
  color: white;
  padding: 5px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border: 2px solid black;
  border-radius: 5px;
}
.body{
    font-size:2vw;
}
#stats{
    border-radius: 5px;
    font-size: 15px;
}

#camcontroll{
    border-radius: 5px;
    font-size: 12px;
}
</style>
<title>Control Panel</title>
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="stylesheet" href="/assets/css/style.css">
    <script src="http://code.jquery.com/jquery-latest.js"></script>//mk301
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
function hideCam() {
  var x = document.getElementById("camcontroll");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
function hideStats() {
  var x = document.getElementById("stats");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
window.onload=hideCam()
window.onload=hideStats()
</script>
<div id="feed">
    
      <img style="-webkit-user-select: none;" src="http://192.168.1.8:8081/" width="560" height="420" onError="this.onerror=null;this.src='/assets/images/loading.gif';">
      <hr>
    
</div>

<button onclick="hideCam()" class="button1">Show/Hide Service Control</button>

<div id="camcontroll">
<button class="button0" onclick="reload()">Refresh Image</button><form action="/assets/php/restartcamera.php?restart=true" method="post"><input type="submit" value="Restart Server" class="button0"></button></form>
<hr>
</div>

<button class="button1" onclick="hideStats()" class="button1">Show/Hide Car Data</button>
<div id="stats">
Distance<div id="dist"></div>
</div>
<hr>


<div class="content"><p>

<p id="fwd" onmousedown="mouseDown()" onmouseup="mouseUp()">
Controls
</p>

<script>
function mouseDown() {
  document.getElementById("fwd").style.color = "red";
}

function mouseUp() {
  document.getElementById("fwd").style.color = "green";
}
</script>
<span class="span_edit_right">
    <a id="delete_work" href="">
        <input id="work_id" type="hidden" value="<?php echo $work_id; ?>"/>
        <i class="fa fa-trash-o" aria-hidden="true">
        </i>
    </a>
</span>
<button type="button" onclick="$.get('/assets/php/writeCommand.php?cmd=f'); return false;">FWD</button><br>
<button type="button" onclick="$.get('/assets/php/writeCommand.php?cmd=b'); return false;">BCK</button>
<br>
<button type="button" onclick="$.get('/assets/php/writeCommand.php?cmd=l'); return false;">LFT</button>
<button type="button" onclick="$.get('/assets/php/writeCommand.php?cmd=r'); return false;">RHT</button>
<br>
<button type="button" onclick="$.get('/assets/php/writeCommand.php?cmd=h'); return false;">Halt</button>

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