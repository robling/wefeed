<?php
	require "simple_html_dom.php";
	
	function update_post($biz,$name,$top_msg){
		$html = file_get_html('http://mp.weixin.qq.com/mp/getmasssendmsg?__biz='.$biz.'&uin=NDEwNjMzMTIw&key=4e8d3432ef9e25d8b7f7409f19bf035e0560449df08c91347a2f8e9e134dd7ab18f4c6cf26f2b248aefb76146316f9e6788c49bdd3963dfebbc3064a7c6a313d8fb4c7e643ccfb4f98996ff76b432dd309431f429a99156db6b0d17ca690f3233642827f468e05fe21406f9c7027924e9ec2b6ea8a27065e077619099daaee85&devicetype=android-16&version=24050122&lang=zh_CN');
		$divs = $html->find('div[class=msg_item news]');
		$listpost = array();
		$new_topmsg = $top_msg;
		//$i=0;
		foreach($divs as $div){
			//$i += 1;
			$pLink = $div->link;
			$parts = parse_url($pLink);
			parse_str($parts['query'], $output);
			$appmsgid = $output['amp;appmsgid'];//获得文章编号
			
			if($appmsgid > $top_msg){//比当前最新文章更新则录入
				if($new_topmsg < $appmsgid){
					$new_topmsg = $appmsgid;
				}
				$indiv = $div->innertext;
				$inner = str_get_html($indiv);
				$titleinner = $inner->find('h4',0);
				$title = $titleinner->plaintext;
				$title = trim($title);//我不知道为什么会多出来空格，只能剪掉。。。
				$single = array('name'=>$name,'biz'=>$biz,'appmsgid'=>$appmsgid,'title'=>$title,);
				array_push($listpost,$single);
				$inner->clear();
			}
		}
		$listpost = array_reverse($listpost);
		dump($listpost);
		$lpost=spClass('lib_post');
		foreach($listpost as $newpost){//写入数据
			$lpost->create($newpost);
		}
		$html->clear();
		return $new_topmsg;
	}
	
	function storeAbstract(){
		//TODO:摘录微信文章的简介，存储在MEMCACHE中。预计过期时间：两天。
		//绝对不直接在网页中提供（规避版权风险
	}
?>