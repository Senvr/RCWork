<html>
<?php

	function startsWith ($string, $startString){
		$len = strlen($startString); 
		return (substr($string, 0, $len) === $startString); 
	} 
	function endsWith($string, $endString) { 
		$len = strlen($endString); 
		if ($len == 0) { 
			return true; 
		} 
		return (substr($string, -$len) === $endString); 
	}

	$dir_open = opendir(getcwd());
	while(false !== ($filename = readdir($dir_open))){
		if($filename != "." && $filename != ".." && ! startsWith($filename,".")&& $filename != "index.php" && $filename != "index.html" ){
			if(endsWith($filename,".html") || endswith($filename,".php") && ! is_dir($filename)){
				$link = "<a href='./$filename'> $filename </a><br />";
				echo $link;
			}else{	
				if(! is_file($filename)){
					$link = "<a href='./$filename'> $filename </a><br />";
					echo $link;
				}
			}
		}
	}
	closedir($dir_open);

?>
</html>