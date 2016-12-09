<?php

namespace qs3\controller;

use n2n\web\http\controller\ControllerAdapter;
use n2n\reflection\annotation\AnnoInit;
use n2n\web\http\annotation\AnnoPath;
use qs3\model\BlogDao;
use n2n\web\http\PageNotFoundException;

class BlogController extends ControllerAdapter {
	private static function _annos(AnnoInit $ai) {
		$ai->m('detail', new AnnoPath('/urlPart:*'));
	}
	
	private $blogDao;
	
	private function _init(BlogDao $blogDao) {
		$this->blogDao = $blogDao;
	}
	
	public function index() {
		// Artikel holen
		$blogArticles = $this->blogDao->getOnlineBlogArticles();
		// Artikel der View übergeben
		$this->forward('..\view\overview.html', array('blogArticles' => $blogArticles));
	}
	
	public function detail(string $urlPart) {
		// Artikel holen
		$blogArticle = $this->blogDao->getBlogArticleByUrlPart($urlPart);
		// prüfen, ob artikel gefunden
		if ($blogArticle === null) {
			throw new PageNotFoundException('Invalid urlPart: ' . $urlPart);
		}
	
		// Artikel weiterleiten
		$this->forward('~\view\detail.html', array('blogArticle' => $blogArticle));
	}
	
	public function doThanks() {
		// 3.) Aufruf über den vollständigen Namespace --> beginnt immer mit \
		$this->forward('\qs3\view\thanks.html');
	}
}

