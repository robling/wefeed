<?php
		echo <<<MIO
		<Iframe src="
MIO;
		echo $url;
		echo <<<MIO
		"; frameborder="0"></iframe>
MIO;
        echo "<script src='http://wefeed.sinaapp.com/static/js/read.js'></script>";
		//加个注释
?>

<style>
    body{
        background: #f8f7f5;
    }
    iframe{
        display: block;
        height: 100%;
        width: 80%;
        margin:50px auto;
    }
</style>
