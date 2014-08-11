<?php

function generateSitemap() {

  $path = $_SERVER['DOCUMENT_ROOT']."/sitemap.txt";

  $domain = "http://www.".$_SERVER['HTTP_HOST'];

  $services = Service::getAll();
  $blogs = Blog::getAll();

  ob_start();
  ?>
<?php echo $domain;?>/
<?php echo $domain;?>/results
<?php echo $domain;?>/blog
<?php foreach ($blogs as $b): ?>
<?php echo $domain;?>/blog/<?php echo $b->getSEOTitle();?>/<?php echo $b->getBlogId()."\n";?>
<?php endforeach; ?>
<?php foreach ($services as $b): ?>
<?php echo $domain;?>/services/<?php echo $b->getSEOName();?>/<?php echo $b->getServiceId()."\n";?>
<?php endforeach; ?>
<?php echo $domain;?>/contact
<?php
$content = ob_get_clean();

  file_put_contents($path, "\xEF\xBB\xBF".  $content); 

}

?>