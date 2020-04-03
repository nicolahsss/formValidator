<?php
$diretorio = dir(__DIR__);
while($arquivo = $diretorio -> read()) {
    if (!in_array($arquivo, ['.','index.php','..','README.md']))
	echo "<a href='".$path.$arquivo."'>".$arquivo."</a><br />";
}
$diretorio -> close();
?>
