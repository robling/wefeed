<?php
class main extends spController
{
	function index(){
		$notajax = $this->spArgs('get', true);
		$lauthor=spClass('lib_artist');
		$authors = $lauthor->spPager($this->spArgs('page', 1), 6)->findAll();
		foreach($authors as &$author){
			$author['image'] = "http://wefeed-img.stor.sinaapp.com/".$author['weid'].".png";
		}
		//dump($authors);
		$page = $lauthor->spPager()->getPager();
		// dump($page);
		if($notajax){
			require './public/authors.php';
		}
		else{
			require './public/authors_ajax.php';
		}
	}
	function article(){
		$notajax = $this->spArgs('get', true);
		$lpost=spClass('lib_post');
		$articles = $lpost->spPager($this->spArgs('page', 1), 20)->findAll(null,"id DESC");
		$page = $lpost->spPager()->getPager();
		if($notajax){
			require './public/article.php';
		}
		else{
			require './public/article_ajax.php';
		}
		
	}
	function authorlist(){
		$notajax = $this->spArgs('get', true);
		$lauthor=spClass('lib_artist');
		$authors = $lauthor->spPager($this->spArgs('page', 1), 6)->findAll();
		foreach($authors as &$author){
			$author['image'] = "http://wefeed-img.stor.sinaapp.com/".$author['weid'].".png";
			$author['feed'] = "http://wefeed.sinaapp.com/feed/".$author['weid'];
		}
		//dump($authors);
		$page = $lauthor->spPager()->getPager();
		//dump($page);
		if($notajax){
			require_once './public/authors.php';
		}
		else{
			require './public/authors_ajax.php';
		}
	}
	
	function author(){//输出作者简介和最新文章
		$notajax = $this->spArgs('get', true);
		$weid = $this->spArgs("weid","0");
		$author = spClass('lib_artist');
		$lpost = spClass('lib_post');
		$condition=array('weid'=>$weid,);
		$info = $author->find($condition);
		$info['image'] = "http://wefeed-img.stor.sinaapp.com/".$info['weid'].".png";
		$info['feed'] = "http://wefeed.sinaapp.com/feed/".$weid;
		$articles = $lpost->spPager($this->spArgs('page', 1), 10)->findAll(array('name'=>$info['name'],),"id DESC");
		$page = $lpost->spPager()->getPager();
		//dump($page);
		if($notajax){
			require_once './public/author.php';
		}
		else{
			require './public/author_ajax.php';
		}
	}
	
	function redirect(){
		$notajax = $this->spArgs('get', true);
		$biz = $this->spArgs("biz","0");
		$appmsgid = $this->spArgs("appmsgid","0");
		
		$url = "http://mp.weixin.qq.com/mp/appmsg/show?__biz=".convert_uudecode(rawurldecode($biz))."&appmsgid=".$appmsgid."&itemidx=1#wechat_redirect";
		
		if($notajax){
			require './public/reader.php';
		}
		else{
			require './public/reader_ajax.php';
		}
		
	}

	function help(){
		require './public/help.php';
	}
}
?>