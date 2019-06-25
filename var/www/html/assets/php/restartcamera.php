<?php
function restart(){
    shell_exec('sudo systemctl restart motion');
	echo " Ran Function";
}
if(isset($_GET['restart'])){
	restart();
	$extra="tank/control.php";
    header("Location: http://192.168.1.8/$extra");
	echo " Redirect Ran ";
    exit;
}
?>