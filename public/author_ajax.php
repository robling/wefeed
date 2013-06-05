<section class="authors">
<ul>
<?php
	foreach ($articles as $key) {
		echo "<li>";
		echo "<a href='".$key['url']."'>".$key["title"]."</a>";
		echo "</li>";
	}
	$next_page = $page['next_page'];
    if ($next_page == $page['current_page']) {
        $next_url = "/author/";
    } else {
        $next_url = "/author/page/".$page['next_page'];
    }
?>
	<aside>
<?php
	$next_page = $page['next_page'];
	if ($next_page == $page['current_page']) {
		$next_url = "/author/";
	} else {
		$next_url = "/author/page/".$page['next_page'];
	}
	echo " <a class='change' title='»»Ò»Åú' href='".$next_url."'><span>></span></a>";
?>
		
	</aside>
</ul>
</section>