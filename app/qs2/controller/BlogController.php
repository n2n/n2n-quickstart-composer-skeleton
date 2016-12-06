<?php

namespace qs2\controller;

use n2n\web\http\controller\ControllerAdapter;
use n2n\reflection\annotation\AnnoInit;
use n2n\web\http\annotation\AnnoPath;

class BlogController extends ControllerAdapter {
	private static function _annos(AnnoInit $ai) {
		$ai->m('detail', new AnnoPath('/urlPart:*'));
	}
	
	public function index() {
		// 1.) Aufruf mit relativem Pfad
		$this->forward('..\view\overview.html');
	}
	
	public function detail($urlPart) {
		// 2.) Aufruf vom Modulpfad aus
		$this->forward('~\view\detail.html');
	}
	
	public function doThanks() {
		// 3.) Aufruf über den vollständigen Namespace --> beginnt immer mit \
		$this->forward('\qs2\view\thanks.html');
	}
}

