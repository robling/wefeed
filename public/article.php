<?php require "header.php"; ?>
<div class="main">
    <section class="new_articles articles">
        <ul>
            <?php
            foreach ($articles as $key) {
                echo "<li>";
                echo "<a target='_blank' href='".$key["url"]."'>".$key["title"]."</a>";
                echo "<small>By ".$key["name"]."</small>";
                echo "</li>";
            }
			//加个注释
            ?>
        </ul>   
        <br clear="both">         
    </section>
</div>
<?php require "footer.php"; ?>