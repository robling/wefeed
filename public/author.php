<?php require "header.php"; ?>

<div class="main">
    <div class="author_page">
       <div class="author">
        <?php
			$name = $info['name'];
			echo "<div><a href='#' title='".$name."'><img class='avatar' src='".$info['image']."'></a>";
			echo "<h4 class='author_name'>".$name."</h4></div>";
			echo "<p class='author_des'>".$info['description']."</p>" 
        ?>
        </div>
        <div class="articles">
            <ul>
            <?php
            foreach ($articles as $key) {
                echo "<li>";
                echo "<a target='_blank' href='".$key['url']."'>".$key["title"]."</a>";
                echo "</li>";
            }
            ?>
            </ul>
        </div>       
    </div>
</div>
<?php require "footer.php"; ?>