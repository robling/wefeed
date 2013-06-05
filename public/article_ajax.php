<ul>
<?php
	foreach ($articles as $key) {
		echo "<li>";
		echo "<a href='".$key["url"]."'>".$key["title"]."</a>";
		echo $key["artist"];
		echo "</li>";
	}
	//加个注释
?>
</ul>