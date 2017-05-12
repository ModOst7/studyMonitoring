<?php
$this->title = 'Главная';
$dom = new DOMDocument();
libxml_use_internal_errors(true);
$dom->loadHTMLFile('http://www.sgu.ru/structure/yablkol');
libxml_clear_errors();
$xpath = new DOMXPath($dom);

$divElements = $xpath->query("/html/body/div[3]/div[2]/div[2]/div[3]/div/div/div[2]");
$this->registerCssFile('http://s1.localhost/myapp/web/assets/singleAssets/news.css');
?>

<h1>НОВОСТИ</h1>
<?php 
$innerHTML = "";
$newdom = new DOMDocument();
foreach ($divElements as $divElement) {
	$newdom->appendChild($newdom->importNode($divElement, true));
}
foreach ($newdom->getElementsByTagName('a') as $link) {
	$link->setAttribute('href', 'http://sgu.ru'.$link->getAttribute('href'));
}
$innerHTML.=trim($newdom->saveHTML());
echo $innerHTML;


/*foreach ($elements as $element) {
	echo "<br>RAZ".$element->nodeType;

	$nodes = $element->childNodes;
	foreach ($nodes as $node) {
		echo $node->nodeType."+".$node->nodeName;
		if ($node->nodeType == 1) {
			$nodechild = $node->childNodes;
			foreach ($nodechild as $subnode) {
			echo $subnode->nodeName." ".$subnode->nodeValue."<br>+";
		}
	}
		
		
	}
} */
$news = [];

/*foreach ($divElements as $divElement) {
	$newsBlocks = $divElement->childNodes;
	for ($i = 0; $i < $newsBlocks->length; $i++) {
		if ($newsBlocks->item($i)->nodeType == 3) continue;
		$parsedBlock = $newsBlocks->item($i)->childNodes;
		foreach ($parsedBlock as $blockElems) {
			if ($blockElems->nodeType == 3) continue;
			if ($elems = $blockElems->childNodes) {
				for ($j = 0; $j < $elems->length; $j++) {
					$news[$i][$j] = $elems->item($j)->nodeValue;
					//echo "Type: ".$elems->item($j)->nodeType."<br>";
			        echo $elems->item($j)->nodeValue."<br>";
				}
				
			}
			
		}
		//echo "Type: ".$newsBlock->nodeType."<br>";
		//echo "Value: ".$newsBlock->nodeValue."<br>";
	}
}*/
//print_r($news);
//print_r($elements->item(0));


?>