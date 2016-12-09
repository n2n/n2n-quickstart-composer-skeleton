<?php
namespace qs1\controller;

use n2n\reflection\annotation\AnnoInit;
use n2n\web\http\controller\ControllerAdapter;
use n2n\web\http\annotation\AnnoPath;

class BlogController extends ControllerAdapter {
	private static function _annos(AnnoInit $ai) {
		$ai->m('detail', new AnnoPath('/urlPart:*'));
	}

	public function index() {
		echo 'Hello World!';
	}

	public function detail(string $urlPart) {
		echo 'Detail: ' . $urlPart;
	}

	public function doThanks() {
		echo 'Vielen Dank für deinen Kommentar.';
	}

}
