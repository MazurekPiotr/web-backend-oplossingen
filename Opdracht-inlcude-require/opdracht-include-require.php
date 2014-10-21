<?php
	$artikels = array(
		array('title' => 'Titel van artikel 1',
			  'text' => 'Tekst van artikel 1',
			  'tags' => 'tag 1 van artikel 1'),
		array('title' => 'Titel van artikel 2',
			  'text' => 'Tekst van artikel 2',
			  'tags' => 'tag 1 van artikel 2'),
		array('title' => 'Titel van artikel 3',
			  'text' => 'Tekst van artikel 3',
			  'tags' => 'tag 1 van artikel 3'));

include'view/header-partial.html';
include'view/body-partial.html';
include'view/footer-partial.html';

?>