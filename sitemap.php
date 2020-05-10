<?php

require_once('api/Engine.php');
$engine = new Engine();

$languages = array();
foreach($engine->languages->get_languages(array('visible'=>1)) as $l){
	$languages[$l->id] = new stdClass;
	$languages[$l->id]->code = $l->code;
	$languages[$l->id]->main = $l->main;
}

$section = $engine->request->get('section');
$url = $engine->config->root_url;
$limit = 30000;

if(empty($section)){
	header("Content-type: text/xml; charset=UTF-8");
	print '<?xml version="1.0" encoding="UTF-8"?>'."\n";
	print '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";
	
	print "\t<sitemap>"."\n";
	print "\t\t<loc>$url/sitemap_main.xml</loc>"."\n";
	print "\t</sitemap>"."\n";
	
	$products_pages = ceil($engine->products->count_products_translations(array('visible' => 1))/$limit);
	for($i=1; $i<=$products_pages; $i++){
		print "\t<sitemap>"."\n";
		print "\t\t<loc>$url/sitemap_$i.xml</loc>"."\n";
		print "\t</sitemap>"."\n";
	}
	
	print '</sitemapindex>'."\n";
}elseif($section == 'main'){
	header("Content-type: text/xml; charset=UTF-8");
	print '<?xml version="1.0" encoding="UTF-8"?>'."\n";
	print '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml/">'."\n";
	
	// Главная страница
	$lastmod = date("Y-m-d");
	foreach($languages as $l){
		if(!$l->main)
			$url = $engine->config->root_url.'/'.$l->code;
		
		print "\t<url>"."\n";
		print "\t\t<loc>$url</loc>"."\n";
		print "\t\t<lastmod>$lastmod</lastmod>"."\n";
		foreach($languages as $sl){
			$suburl = $engine->config->root_url.'/';
			if(!$sl->main)
				$suburl = $engine->config->root_url.'/'.$sl->code.'/';
			print "\t\t<xhtml:link rel='alternate' hreflang='$sl->code' href='$suburl' />"."\n";
		}
		
		print "\t</url>"."\n";
	}
	// Страницы
	$pages = array();
	foreach($engine->pages->get_pages_translations(array('visible' => 1)) as $pt){
		if($pt->page_id != 2)
			$pages[$pt->page_id][$pt->language_id] = $pt;
	}

	foreach($pages as $page){
		foreach($page as $p){
			$url = $engine->config->root_url.'/';
			if(!$languages[$p->language_id]->main)
				$url .= $languages[$p->language_id]->code.'/';
			
			$url .= esc($p->url);
			
			print "\t<url>"."\n";
			print "\t\t<loc>$url</loc>"."\n";
			
			foreach($page as $pg){			
				$suburl = $engine->config->root_url.'/';
				if(!$languages[$pg->language_id]->main)
					$suburl .= $languages[$pg->language_id]->code.'/';
				
				$suburl .= esc($pg->url);
				
				print "\t\t<xhtml:link rel='alternate' hreflang='".$languages[$pg->language_id]->code."' href='$suburl' />"."\n";
			}
			
			print "\t</url>"."\n";
		}
	}

	// Категории новостей
	$news_categories = array();
	foreach($engine->news->get_news_categories_translations(array('visible' => 1)) as $ct)
		$news_categories[$ct->category_id][$ct->language_id] = $ct;

	foreach($news_categories as $news_category){
		foreach($news_category as $p){
			$url = $engine->config->root_url.'/';
			if(!$languages[$p->language_id]->main)
				$url .= $languages[$p->language_id]->code.'/';
			
			$url .= 'news/'.esc($p->url);
			
			print "\t<url>"."\n";
			print "\t\t<loc>$url</loc>"."\n";
			
			foreach($news_category as $cg){			
				$suburl = $engine->config->root_url.'/';
				if(!$languages[$cg->language_id]->main)
					$suburl .= $languages[$cg->language_id]->code.'/';
				
				$suburl .= 'news/'.esc($cg->url);
				
				print "\t\t<xhtml:link rel='alternate' hreflang='".$languages[$cg->language_id]->code."' href='$suburl' />"."\n";
			}
			
			print "\t</url>"."\n";
		}
	}

	// Новости
	$posts = array();
	foreach($engine->news->get_posts_translations(array('visible' => 1)) as $pt)
		$posts[$pt->post_id][$pt->language_id] = $pt;


	foreach($posts as $post){
		foreach($post as $p){
			$url = $engine->config->root_url.'/';
			if(!$languages[$p->language_id]->main)
				$url .= $languages[$p->language_id]->code.'/';
			
			$url .= 'post/'.esc($p->url);
			
			print "\t<url>"."\n";
			print "\t\t<loc>$url</loc>"."\n";
			
			foreach($post as $pg){			
				$suburl = $engine->config->root_url.'/';
				if(!$languages[$pg->language_id]->main)
					$suburl .= $languages[$pg->language_id]->code.'/';
				
				$suburl .= 'post/'.esc($pg->url);
				
				print "\t\t<xhtml:link rel='alternate' hreflang='".$languages[$pg->language_id]->code."' href='$suburl' />"."\n";
			}
			
			print "\t</url>"."\n";
		}
	}

	// Категории товаров
	$categories = array();
	foreach($engine->categories->get_all_categories_translations(array('visible' => 1)) as $ct)
		$categories[$ct->category_id][$ct->language_id] = $ct;

	foreach($categories as $category){
		foreach($category as $p){
			$url = $engine->config->root_url.'/';
			if(!$languages[$p->language_id]->main)
				$url .= $languages[$p->language_id]->code.'/';
			
			$url .= 'catalog/'.esc($p->url);
			
			print "\t<url>"."\n";
			print "\t\t<loc>$url</loc>"."\n";
			
			foreach($category as $cg){			
				$suburl = $engine->config->root_url.'/';
				if(!$languages[$cg->language_id]->main)
					$suburl .= $languages[$cg->language_id]->code.'/';
				
				$suburl .= 'catalog/'.esc($cg->url);
				
				print "\t\t<xhtml:link rel='alternate' hreflang='".$languages[$cg->language_id]->code."' href='$suburl' />"."\n";
			}
			
			print "\t</url>"."\n";
		}
	}
	
	print '</urlset>'."\n";
}elseif(intval($section) >= 1 ){
	header("Content-type: text/xml; charset=UTF-8");
	print '<?xml version="1.0" encoding="UTF-8"?>'."\n";
	print '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xhtml="http://www.w3.org/1999/xhtml/">'."\n";
	
	// Товары
	$products = array();
	foreach($engine->products->get_products_translations(array('page' => intval($section), 'limit' => $limit, 'visible' => 1)) as $pt)
		$products[$pt->product_id][$pt->language_id] = $pt;

	foreach($products as $product){
		foreach($product as $p){
			$url = $engine->config->root_url.'/';
			if(!$languages[$p->language_id]->main)
				$url .= $languages[$p->language_id]->code.'/';
			
			$url .= 'products/'.esc($p->url);
			
			print "\t<url>"."\n";
			print "\t\t<loc>$url</loc>"."\n";
			
			foreach($product as $pg){			
				$suburl = $engine->config->root_url.'/';
				if(!$languages[$pg->language_id]->main)
					$suburl .= $languages[$pg->language_id]->code.'/';
				
				$suburl .= 'products/'.esc($pg->url);
				
				print "\t\t<xhtml:link rel='alternate' hreflang='".$languages[$pg->language_id]->code."' href='$suburl' />"."\n";
			}
			
			print "\t</url>"."\n";
		}
	}
	
	print '</urlset>'."\n";
}

function esc($s)
{
	return(htmlspecialchars($s, ENT_QUOTES, 'UTF-8'));	
}