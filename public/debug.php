<?php
$authors = array(
    "0" => Array(
        'id' => 1,
        'biz' => 'MjM5ODc1NDUwMg==',
        'name' => '42号茶馆',
        'weid' => 'teahouse42',
        'description' => '42号茶馆，在这里，我们每天聊聊书、App、电影、网站或一篇好文。',
        'image' => "../static/images/1.jpg",
    ),
);

$articles = array(
    "0" => Array
    (
        'id' => 303,
        'artist' => 'ItTalks',
        'biz' => 'MjM5NjA4MTAyMA==',
        'appmsgid' => '10000378',
        'title' => '马云的曹操范儿',
    ),
);
$articles[0]['url'] = "http://mp.weixin.qq.com/mp/appmsg/show?__biz=".$articles[0]['biz']."&appmsgid=".$articles[0]['appmsgid']."&itemidx=1#wechat_redirect";
$author = $authors[0];
for($i = 1; $i < 9; $i++) {
    $authors[$i] = $authors[0];
    $authors[$i]["image"] = "../static/images/".$i.".jpg";
    $articles[$i] = $articles[0];
}
?>