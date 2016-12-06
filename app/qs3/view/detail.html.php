<?php
	use n2n\impl\web\ui\view\html\HtmlView;
	use n2n\web\ui\view\View;
	use qs3\bo\BlogArticle;
	
	$view = HtmlView::view($this);
	$html = HtmlView::html($view);
	 
	// Artikel aus den Parametern einlesen und überprüfen
	$blogArticle = $view->getParam('blogArticle');
	$view->assert($blogArticle instanceof BlogArticle);
	// Kommentare vom Artikel auslesen
	$blogComments = $blogArticle->getComments();
	 
	// Artikel Titel wird an das Template übergeben
	$view->useTemplate('boilerplate.html', array('title' => $blogArticle->getTitle()));
?>
<h1><?php $html->out($blogArticle->getTitle()) ?></h1>
<p>
    <strong><?php $html->out($blogArticle->getLead()) ?></strong>
</p>
 
<strong>Artikel-Kategorien</strong>
<ul>
    <?php foreach ($blogArticle->getCategories() as $blogCategory): ?>
        <li><?php $html->out($blogCategory->getName()) ?></li>
    <?php endforeach ?>
</ul>
 
<?php $view->out($blogArticle->getContentHtml()) ?>
 
<?php $html->linkToController(null, 'Zur Übersicht') ?>