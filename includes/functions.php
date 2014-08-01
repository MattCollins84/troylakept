<?

function generateSitemap() {

  $path = $_SERVER['DOCUMENT_ROOT']."/sitemap.txt";

  $domain = "http://www.".$_SERVER['HTTP_HOST'];

  $services = Service::getAll();
  $blogs = Blog::getAll();

  ob_start();
  ?>
<?=$domain;?>/
<?=$domain;?>/results
<?=$domain;?>/blog
<? foreach ($blogs as $b): ?>
<?=$domain;?>/blog/<?=$b->getSEOTitle();?>/<?=$b->getBlogId()."\n";?>
<? endforeach; ?>
<? foreach ($services as $b): ?>
<?=$domain;?>/services/<?=$b->getSEOName();?>/<?=$b->getServiceId()."\n";?>
<? endforeach; ?>
<?=$domain;?>/contact
<?
$content = ob_get_clean();

  file_put_contents($path, "\xEF\xBB\xBF".  $content); 

}

?>