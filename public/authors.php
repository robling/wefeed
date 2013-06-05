<?php require "header.php"; ?>

<div class="main">
    <section class="authors">
        <ul>
            <?php
            foreach ($authors as $key) {
                echo "<li class='one_author'>";
                echo "<div><a href='/a/".$key['weid']."' class='author_url' title='".$key["name"]."'><img src='".$key["image"]."' alt='' class='avatar'>";
                echo "<h4 class='author_name'>".$key["name"]."</h4></a></div>";
                echo "<br class='clear'>";
                echo "<p class='author_des'>".$key[description]."</p>";
                echo "</li>";
            }
            ?>
        </ul>
        <img src="../static/css/loading.gif" alt="" class="loading"> 
        <aside>
            <?php
                $next_page = $page['next_page'];
                if ($next_page == $page['current_page']) {
                    $next_url = "/author/";
                } else {
                    $next_url = "/author/page/".$page['next_page'];
                }
                echo " <a class='change' title='换一批' href='".$next_url."'><span>></span></a>";
            ?>
           
        </aside>
        <br clear="both">        
    </section>
</div>
<?php require "footer.php"; ?>