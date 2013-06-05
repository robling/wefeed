<?php
	function pushauthor($weid){
		$author = spClass('lib_artist');
		$lpost = spClass('lib_post');
		
		$condition=array('weid'=>$weid,);
		$info = $author->find($condition);
		
		$articles = $lpost->spPager(1, 15)->findAll(array('name'=>$info[name],"id DESC"));

		$page = $lpost->spPager()->getPager();

		foreach($articles as &$article){
			$article['url'] = "http://mp.weixin.qq.com/mp/appmsg/show?__biz=".$article['biz']."&appmsgid=".$article['appmsgid']."&itemidx=1#wechat_redirect";
		}
		push($articles);
	}

	function pushall(){
		$lpost=spClass('lib_post');
		$articles = $lpost->spPager(1, 15)->findAll(null,"id DESC");
		$page = $lpost->spPager()->getPager();
		foreach($articles as &$article){
			$article['url'] = "http://mp.weixin.qq.com/mp/appmsg/show?__biz=".$article['biz']."&appmsgid=".$article['appmsgid']."&itemidx=1#wechat_redirect";
		}
		push($articles);
	}
	
	function push($articles){
		$now = date("D, d M Y H:i:s T");
		$link = "http://wefeed.sinaapp.com/feed/";
		$title = "wechat";
		$output = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
					<rss version=\"2.0\">
						<channel>
							<title>New Articles of ".$title."</title>
							<link>http://wefeed.sinaapp.com/feed</link>
							<description>New Articles of ".$title."</description>
							<language>zh-CN</language>
							<pubDate>".$now."</pubDate>
							<lastBuildDate>".$now."</lastBuildDate>
							<docs>http://spdf.me/</docs>
							<managingEditor>spdf@live.com</managingEditor>
							<webMaster>spdf@live.com</webMaster>
            ";
            
		foreach ($articles as $line){
			$output .= "<item>
			<title><![CDATA[".$line['title']."]]></title>
			<link><![CDATA[".$line['url']."]]></link>
			</item>";
		}
		$output .= "</channel>
		</rss>";
		echo($output);
	}

?>