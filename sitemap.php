<?php

require_once('api/Engine.php');
$engine = new Engine();

header("Content-type: text/xml; charset=UTF-8");
print '<?xml version="1.0" encoding="UTF-8"?>'."\n";
print '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";

// Главная страница
$url = $engine->config->root_url;
$lastmod = date("Y-m-d");
print "\t<url>"."\n";
print "\t\t<loc>$url</loc>"."\n";
print "\t\t<lastmod>$lastmod</lastmod>"."\n";
print "\t</url>"."\n";

// Страницы
foreach($engine->pages->get_pages() as $p)
{
	if($p->visible && $p->menu_id == 1)
	{
		$url = $engine->config->root_url.'/'.esc($p->pre_url).esc($p->url);
		print "\t<url>"."\n";
		print "\t\t<loc>$url</loc>"."\n";
		print "\t</url>"."\n";
	}
}

// Блог
foreach($engine->news->get_posts(array('visible'=>1)) as $p)
{
	$url = $engine->config->root_url.'/news/'.esc($p->url);
	print "\t<url>"."\n";
	print "\t\t<loc>$url</loc>"."\n";
	print "\t</url>"."\n";
}

// Категории
foreach($engine->categories->get_categories() as $c)
{
	if($c->visible)
	{
		$url = $engine->config->root_url.'/catalog/'.esc($c->url);
		print "\t<url>"."\n";
		print "\t\t<loc>$url</loc>"."\n";
		print "\t</url>"."\n";
	}
}

// Бренды
/* foreach($engine->brands->get_brands() as $b)
{
	$url = $engine->config->root_url.'/brands/'.esc($b->url);
	print "\t<url>"."\n";
	print "\t\t<loc>$url</loc>"."\n";
	print "\t</url>"."\n";
} */

// Товары
$engine->db->query("SELECT url FROM __products WHERE visible=1");
foreach($engine->db->results() as $p)
{
	$url = $engine->config->root_url.'/products/'.esc($p->url);
	print "\t<url>"."\n";
	print "\t\t<loc>$url</loc>"."\n";
	print "\t</url>"."\n";
}

print '</urlset>'."\n";

function esc($s)
{
	return(htmlspecialchars($s, ENT_QUOTES, 'UTF-8'));	
}