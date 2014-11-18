<?php 
  function __autoload($klasse)
  {
    include 'classes/'. $klasse . '.php';
  }

  $builder = new HTMLBuilder('html/header.partial.html', 'html/body.partial.html', 'html/footer.partial.html');
?>