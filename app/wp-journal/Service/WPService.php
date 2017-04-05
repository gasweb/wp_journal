<?php
namespace Magazine\Service;

use Sunra\PhpSimple\HtmlDomParser;

class WPService
{

	private function getWpPost($config)
	{
		return get_posts($config);
	}

	/*
	Если в таблице tibl-articles есть запись о текущей странице
	то переадресовываем пользователя на новую страницу
	*/

	public static function redirectOldPageToNewArticle($page_id)
	{
		$Article = mvc_model('Article');
		$object = $Article->find(array(
		  'conditions' => array(
		    'OR' => array(
		      'Article.wp_page_id' => $page_id,
		      'Article.wp_page_en_id' => $page_id	      
		    )
		  )
		)
		);
		if(is_array($object) && is_object($object[0])){
			$article = array_shift($object);
			if($article->wp_page_id == $page_id)
				$urlToRedirect = "/article/$article->id/";
			elseif($article->wp_page_en_id == $page_id)
				$urlToRedirect = "/en/article/$article->id/";
			header("Location: $urlToRedirect");
		}
	}

	/*
	Переадресовываем пользователя на новую страницу содержания
	*/

	public static function redirectToNewContents($year, $number)
	{
		$Journal = mvc_model('Journal');
		$object = $Journal->find(array(
		  'conditions' => array(		    
		      'Journal.number' => $number,
		      'Journal.year' => $year	      		    
		  )
		)
		);
		if(is_array($object) && is_object($object[0])){
			$journal = array_shift($object);
			$urlToRedirect = "/journal/$journal->id/$number-$year";	
			header("Location: $urlToRedirect");
		}
	}

	public static function getPageArrayByAlias($alias)
	{
		if(!empty($alias))
		{
			$page = self::getWpPost(array(
	        'name'      => $alias,        
	        'post_type' => 'page'        
	    	));
	    	if(!$page)
	    		$page = self::getWpPost(array(
	        'name'      => $alias,        
	        'post_type' => 'post'        
	    	));		/**/	

	    	return $page;
		}
	}

	public static function getMyPageArrayByAlias($alias)
	{
		$page = self::getPageArrayByAlias($alias);
		if(is_array($page))
		{
			$page = array_shift($page);
			if(is_object($page)){
				return array("id"=> $page->ID,
				"post_title"=> $page->post_title,
				"post_content"=> $page->post_content,
				);		
			}
		}
	}

	function getTiblContents($path)
	{
		$contentPageArray = WPService::getPageArrayByAlias($path);
		$ContentPage = array_shift($contentPageArray);
		$contentToParse = $ContentPage->post_content;
		$contentToParse = nl2br ($contentToParse);
		$order   = array("<br>", "<br />");
		$replace = '<p>';
		$contentToParse = str_replace($order, $replace, $contentToParse);
		return $contentToParse;
	}


	function getArray($contentToParse, $config=array("lang"=>"ru"))
	{
		$pages = array();
		$number = $config['number'];
		$year = $config['year'];

		if($config['lang']=="en")
	{
		$_p_wp_page_id = "wp_page_id_en";
		$_p_title = "title_en";
		$_p_post_title = "post_title_en";
		$_p_post_content = "post_content_en";
		$_p_authors = "authors_en";
	}
	else
	{
		$_p_wp_page_id = "wp_page_id";
		$_p_title = "title";
		$_p_post_title = "post_title";
		$_p_post_content = "post_content";
		$_p_authors = "authors";
	}
	$HtmlDomParser = HtmlDomParser::str_get_html( $contentToParse );
	if(!is_object($HtmlDomParser))
	{
		echo "$number $year $config[lang] is null <br>!";
	}
	/*foreach($dom->find('p.thesis-author, p.thesis-title') as $key => $p) {
	    echo $key." - ".$p->innertext . "<br>";
	}*/
	else
	{
	$pageIsBuild = false;
	foreach($HtmlDomParser->find('p.thesis-author') as $key_author => $p_author) {
		    $author_arr[$key_author] = $p_author->innertext;
		}
	
	foreach($HtmlDomParser->find('a') as $key => $p) 
		{
		/*
		echo "<pre>";
			print_r($author_arr);
		echo "</pre>";
		*/
	    $authors = $p->parent();
	    $authors = $authors->prev_sibling();

	    //$header = array("h1","h2","h3","h4","h5","h6");

	    $link = $p->href;
		$title = $p->innertext;
		$author = $authors->innertext; 
		/*
		echo "<br><hr>";
		print_r($author_arr[$key]);
		echo $author_arr[$key]."***<br>";
		echo $author_arr."==<br>";
		print_r($author)."++<br>";
		echo "<br><hr>";
		*/
		$author = (!empty($author_arr[$key])) ? $author_arr[$key] : $authors->innertext;

		$link_arr = explode("/",$link);
		$need_link = array_pop($link_arr);
		if(!$need_link)
			$need_link = array_pop($link_arr);

		$page = self::getMyPageArrayByAlias($need_link);
		$pages[] = array(
	    	"year"=>$year,
	    	"number"=>$number,
	    	$_p_wp_page_id=>$page['id'],
	    	$_p_title=>$title,
	    	$_p_authors=>$author,
	    	$_p_post_title=>$page['post_title'],
	    	$_p_post_content=>$page['post_content']
	    	);
		$pageIsBuild = true;
		}
		if(!$pageIsBuild)
		{
			foreach($HtmlDomParser->find('p.thesis-author p.thesis-title') as $key => $p) 
			{
				$author = $p->innertext;
				$title = $p->innertext;
				$pages[] = array(
			    	"year"=>$year,
			    	"number"=>$number,
			    	$_p_wp_page_id=>NULL,
			    	$_p_title=>$title,
			    	$_p_authors=>$author,
			    	$_p_post_title=>NULL,
			    	$_p_post_content=>NULL
			    	);
			}
		}
	}
	return $pages;
}

}