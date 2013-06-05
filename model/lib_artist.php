<?php
class lib_artist extends spModel
{
  var $pk = "id"; // 数据表的主键
  var $table = "lib_artist"; // 数据表的名称
  var $linker = array(
	array(
	'type' => 'hasmany',   // 一对多关联
    'map' => 'lib_post',    // 关联的标识
    'mapkey' => 'name',
    'fclass' => 'lib_post',
    'fkey' => 'name',
	'limit' => '10', // 限制返回10条文章记录
    'sort' => 'id DESC', // 返回的文章记录按文章ID倒序，也就是最新10条
    'enabled' => true
	),
  );
}
?>