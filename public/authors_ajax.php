<?php 
	header('Content-type: application/xml');
	$ul = <<<MIO
    <ul>
MIO;
	foreach ($authors as $key) {
		$ul .= "<li class='one_author'>";
		$ul .=  "<div><a href='/a/".$key['weid']."' class='author_url' title='".$key["name"]."'><img src='".$key["image"]."' alt='' class='avatar'>";
		$ul .=  "<h4 class='author_name'>".$key["name"]."</h4></a></div>";
		$ul .=  "<br class='clear'>";
		$ul .=  "<p class='author_des'>".$key["description"]."</p>";
		$ul .=  "</li>";
	}
	//呵呵，加个注释
	$ul .= "</ul>";
    $href = $page['next_page'];
    if ($href == $page['current_page']) {
        $href = "/author/";
    } else {
        $href = "/author/page/".$page['next_page'];
    }
	$output = <<<MIO
<?xml version="1.0" encoding="UTF-8"?>
<root>
<ul>
<![CDATA[
MIO;
	$output .= $ul;
	$output .= "]]>
</ul>
<href>";
	$output .= $href."</href></root>";
	echo $output;
?>
