<?php
use \Magazine\Service\PdfService;



/*
$file = PdfService::extractPdf(array(
	"source" => "1-2016.pdf",
	"page_start" => 5,
	"page_end" => 9, 
	"file_name" => "test.pdf", 
	"year" => 2016, 
	"number" => 1
	));
*/
$ArticleModel = mvc_model('Article');

 $objects = $ArticleModel->find(array(
 	//'includes' => array('Journal'),
 	'selects' => array('Article.id', 'Article.pdf_link', 'Article.journal_id', 'Article.section_id', 'Article.page_start', 'Article.page_end' /*, 'Journal.year', 'Journal.number'*/),
 	//'selects' => array('Journal.id', 'Journal.year', 'Event.number', 'Event.active'),
      /*'joins' => array('Journal'),
      'includes' => array('Journal'),
      'selects' => array('Journal.id', 'Journal.year', 'Event.number', 'Event.active'),     */       
      /*'group' => 'Event.id',
      'order' => 'Event.date DESC',
      'page' => 1
      'per_page' => 20*/
    ));    
 //print_r($objects);

 foreach($objects AS $Article)
{
	/*$file = PdfService::extractPdf(array(
	"source" => $Article->journal->pdf_link,
	"page_start" => $Article->page_start,
	"page_end" => $Article->page_end, 
	"file_name" => $Article->pdf_link, 
	"year" => $Article->journal->year, 
	"number" => $Article->journal->number
	));*/

	//$ArticleModel->update($Article->__id, array('pdf_link' => $file['name']));
	//die($Article->__id);
}

//$this->update($object->__id, array('file_name' => $file['name']));


print_r($file);
echo "done";
die;
$Old = mvc_model('Old');
$objects = $Old->find(array(
	//'includes' => array('Old'),
	"selects" => array("Old.id, Old.number")
	));
// controllers/events_controller.php
print_r($objects);
die;
$base_dir = "/webservers/xampp/htdocs/tibl.new/www/wp-content/uploads/journals/";
//mkdir($base_dir."/"."test");
//die;
$Journal = mvc_model('Journal');
$startYear = 1922;
for($year = 2013; $year<=2016; $year++){
for($number = 1; $number<=12; $number++){
	$Journal->save(
		array(
			"number" => $number,
			"year" => $year,
			"link_contents" => "$number-$year",
			"link_contents_en" => "$number-$year-en",
			"pdf_link" => "$year/$number/$number-$year.pdf",
			"volume" => $year-$startYear,
			)
		);
	$journal_dir = $base_dir."/".$year."/".$number;
	mkdir($journal_dir, 0777, true);
	if(is_dir($journal_dir))
	{
		$pdfile = fopen($journal_dir."/$number-$year.pdf", "a+");
		fclose($pdfile);
	}
}
}
die;
use Magazine\Service\WPService;
/*
$OldArticle = mvc_model('TiblTest');
foreach($test AS $article)
{
	$modelData = array(
		"wp_page_id" =>$article->wp_page_id,
		"wp_page_id_en" =>$article->wp_page_id_en,
		"number" =>$article->number,
		"section" =>$article->section,
		"year" =>$article->year,
		"page_start" =>$article->page_start,
		"page_end" =>$article->page_end,
		"title" =>$article->title,
		"title_en" =>$article->title_en,
		"post_title" =>$article->post_title,
		"post_title_en" =>$article->post_title_en,
		"authors" =>$article->authors,
		"authors_en" =>$article->authors_en,
		"post_content" =>$article->post_content,
		"post_content_en" =>$article->post_content_en
		);
print_r($modelData);
    //$OldArticle->save($modelData);
}
*/
//for($year = 2013; $year<2016; $year++)
//for($number = 1; $number<=12; $number++)
//die;
if(1==2)
{
//$number = 2;
//$year = 2016;

//$number = 1;
//$year = 2014;
$contentToParse = WPService::getTiblContents("$number-$year");
$contentToParse_en = WPService::getTiblContents("$number-$year"."-en");

//print_r($contentToParse);
//print_r($contentToParse_en);
$content = WPService::getArray($contentToParse,array("lang"=>"ru", "number"=> $number, "year"=> $year));
$content_en = WPService::getArray($contentToParse_en,array("lang"=>"en", "number"=> $number, "year"=> $year));


print_r($content);
print_r($content_en);
for($i=0; $i<count($content); $i++)
{
	if(is_array($content[$i]) && is_array($content_en[$i]))
	$for_model_array[] = array_merge($content[$i], $content_en[$i]);
}
print_r($for_model_array);
if(is_array($for_model_array))
{
$OldArticle = mvc_model('Old');
foreach($for_model_array AS $oldArticle)
{
    $OldArticle->save($oldArticle);
}
}

unset($OldArticle);
unset($for_model_array);
unset($content);
unset($contentToParse);
unset($contentToParse_en);


	/*
    $OldArticle = mvc_model('Old');
    $OldArticle->save(array(
    	"year"=>$year,
    	"number"=>$number,
    	"wp_page_id"=>$page['id'],
    	"title"=>$title,
    	"post_title"=>$page['post_title'],
    	"post_content"=>$page['post_content'],
    	"wp_page_id_en"=>"",
    	"post_content_en"=>"",
    	"title_en"=>"",
    	"post_title_en"=>"",
    	));*/

}
//$dom = HtmlDomParser::file_get_html ( "http://new.tibl-journal.com/1-2013/" );
/*
foreach($dom AS $e)
{
	echo $e->innerhtml . " element <br>";
}
*/
//http://new.tibl-journal.com/1-2013/

//or
//$html = file_get_html('www.example.com');

//$dom->find('p', 1)->class = 'thesis-title';
//$e->prev_sibling;
//print_r($dom);

//foreach($dom as $link) {
//echo "<pre>";
