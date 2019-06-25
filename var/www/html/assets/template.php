<html>
<head>
<title>Page Title</title>
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="stylesheet" href="/assets/css/style.css">
</head>
<div class="info">
<body background="bgimage.jpg">

<h1>Lorem ipsum.</h1>
<h3>Lorem ipsum dolor sit amet.</h3>
<font size="2"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br></p></div></font>

<div class="content">
<p>

Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque condimentum turpis a dui accumsan, dignissim auctor mi placerat. Fusce sed faucibus arcu. Mauris ultricies ornare tortor, euismod hendrerit metus. Praesent lacus lorem, faucibus non ipsum non, tristique bibendum nunc. Aenean in enim eu mauris sollicitudin congue in ac tellus. Etiam malesuada convallis nulla quis venenatis. Etiam et mauris sit amet magna pharetra tincidunt vitae quis ipsum. Nunc at dolor sit amet odio accumsan ullamcorper id et felis. Mauris imperdiet vehicula pellentesque. Praesent et elit dui. Vestibulum ultrices, metus nec ultricies gravida, magna magna pulvinar sem, eu iaculis nunc metus eget augue. Integer eget mattis felis, ac posuere risus. Etiam et lectus pretium, tempor nisl quis, tristique turpis. Vivamus venenatis libero ut orci dictum venenatis.

</p>
<!-- file dir list thing
<hr>
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

?><hr>
-->
<div class="footer"><p>
<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/assets/footer.php');
?>
</p>
</div>
</div>
</body>
</html>