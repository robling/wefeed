<?php require "header.php"; ?>
<div class="main">
    <form method="post" action="http://wefeed.sinaapp.com/update/addnewauthor" class="new_author">
        <fieldset>
            <legend>提交公众帐号</legend>
            <div class="field">
                <label for="weid">微信ID：</label>
                <input type="text" name="weid" id="weid" required>
            </div>
            <div class="field">
                <label for="name">昵称：</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="field">
                <label for="description">简介:</label>
                <textarea name="description" id="description" required></textarea>
            </div>
            <div class="field">
                <label for="avatar">头像url:</label>
                <input type="url" name="avatar" id="avatar" >
            </div>
            <div class="field">
                <label for="biz">biz:</label>
                <input type="text" name="biz" id="biz" required>
            </div>
            <div class="action">
                <input type="submit" id="submit" value="提交">
            </div>
        </fieldset>
    </form>
</div>
<?php require "footer.php"; ?>