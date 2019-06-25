<?php
$commandfile='/home/pi/serialman/data/web.in';
//$cmdfile = fopen($commandfile,"w");
$currcmd=file_get_contents($commandfile);
$cmd=$_GET['cmd'];
echo $cmd."\n\n";
if($cmd != $currcmd){
file_put_contents($commandfile,$cmd);
echo "Ran command";
}

?>