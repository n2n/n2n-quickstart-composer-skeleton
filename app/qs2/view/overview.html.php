<?php
    use n2n\impl\web\ui\view\html\HtmlView;
    use n2n\web\ui\view\View;
 
    // freiwillige Zeile
    $view = HtmlView::view($this);
    // Anweisung das Template zu nutzen
    $view->useTemplate('boilerplate.html', array('title' => 'Übersicht'));
?>

<h1>Unsere Blogartikel</h1>
<p>Hier folgen die Artikel</p>