<?php
class update extends spController
{
	function index(){
		echo 'The update page of all item';
	}
	function renew(){//更新指定id的作者的文章
		require("./app/update.php");
		$id = $this->spArgs("id", "0"); 
		dump($id);
		$artistinfo=spClass('lib_artist');
		$condition=array('id'=>$id,);
		$artist = $artistinfo->findAll($condition);
		$single = $artist[0];
		dump($single);
		$new_top = update_post($single[biz],$single[name],$single[top_msg]);
		dump($new_top);
		$artistinfo->updateField($condition, 'top_msg', $new_top);
	}
	function newauthor(){//增加新作者
		require('./public/new_author.php');
	}
	function addnewauthor(){
		$biz = $this->spArgs("biz", "0");
		$name = $this->spArgs("name", "0");
		$weid = $this->spArgs("weid", "undefined");
		$description = $this->spArgs("description", "undefined");
		$avatarlink = $this->spArgs("avatar", "undefined");
		dump($avatarlink);
		$s = new SaeStorage();
		$f = new SaeFetchurl();
		$img_data = $f->fetch($avatarlink);
		$avatar = new SaeImage($img_data);
		
		$avatar->resize(200);
		$new_data = $avatar->exec("png");
		echo $s->write( 'img' , $weid.'-200.png' , $new_data );

		echo '<hr/>';
		$avatar->resize(100);
		$new_data = $avatar->exec("png");
		echo $s->write( 'img' , $weid.'.png' , $new_data );
		echo '<hr/>';
		$artistinfo = spClass('lib_artist');
		if($biz != '0'){
			$artistinfo->create(array('biz'=>$biz,'name'=>$name,'weid'=>$weid,'top_msg'=>'0','description'=>$description));
			exit('OK!');
		}
		echo 'BAD';
	}/*
	function storeimage(){
		$avatarlink = 'http://www.chuansong.me/static/img/image/Upoetry.jpeg';
		
		$f = new SaeFetchurl();
		$img_data = $f->fetch($avatarlink);
		$avatar = new SaeImage($img_data);
		$avatar->resize(200);
		$new_data = $avatar->exec("jpg");
		
		$s = new SaeStorage();
		$url = $s->write( 'img' , 'haha.png' , $new_data );
		echo $url;
	}*/
	function addtask(){//更新任务队列
		require_once('./app/task.php');
	}
	function feed(){
		$weid = $this->spArgs("weid","all");
		include('./app/rss.php');
		header("Content-type: text/xml");
		if($weid === 'all'){
			pushall();
		}
		else{
			pushauthor($weid);
		}
	}
}