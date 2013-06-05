<?php
	$domains = 'http://wefeed.sinaapp.com';//SET Domains
	$artistinfo = spClass('lib_artist');
	$list_of_artist = $artistinfo->findAll($conditions = null);
	dump($list_of_artist);
	$taskarray = array();
	foreach($list_of_artist as $array){
		array_push($taskarray,array('url'=>$domains.spUrl('update','renew').'/'.$array[id]));
	}
	dump($taskarray);
	$queue = new SaeTaskQueue('updatepost');//指定的Task queue队列，仅用于sae环境
	$queue->addTask($taskarray);
	$ret = $queue->push();
    var_dump($ret);
?>