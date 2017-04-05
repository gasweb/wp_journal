<?php
namespace Magazine\Article;

class WpMvcArticle extends Article
{	
	public function __construct(\MvcModelObject $object)
	{
		$this->setId($object->id);
		$this->setJournalId($object->journal_id);
		$this->setDoi($object->doi);
		$this->setUdk($object->udk);
		$this->setTitle($object->title);
		$this->setTitle($object->title_en, "en");
		$this->setAuthor($object->author);
		$this->setAuthor($object->author_en,"en");
		$this->setPlaces($object->places);
		$this->setPlaces($object->places_en,"en");
		$this->setReference($object->reference);
		$this->setReference($object->reference_en,"en");		
		$this->setArticleText($object->article_text,"ru");
		$this->setArticleText($object->article_text_en,"en");
		$this->setKeyWords($object->key_words,"ru");
		$this->setKeyWords($object->key_words_en,"en");
		$this->setPageStr($object->pages_str);
		$this->setPageStart($object->page_start);
		$this->setPageEnd($object->page_end);
		$this->setPdfLink($object->pdf_link);		
		$this->setWpContent($object->wp_content);	
		$this->setWpContent($object->wp_content_en, "en");
		$this->setWpPageId($object->wp_page_id);	
		$this->setWpPageId($object->wp_page_en_id, "en");
		$this->setAuthorContents($object->author_contents, "ru");
		$this->setAuthorContents($object->author_contents_en, "en");
		$this->setSectionId($object->section->id, "ru");
		$this->setSection($object->section->section, "ru");
		$this->setSection($object->section->section_en, "en");
		$this->setSection($object->section->section_plural, "ru",1);
		$this->setSection($object->section->section_en_plural, "en",1);
			
	}

	public function setArticleText($articleText, $lang="ru")
	{
		$this->articleText[$lang] = $articleText;		
	}
	public function getArticleText($lang="ru")
	{
		if(isset($this->articleText[$lang]))
			return $this->articleText[$lang];		
	}
	public function setReference($reference, $lang="ru")
	{
		$this->reference[$lang] = $reference;		
	}
	public function getReference($lang="ru")
	{
		if(isset($this->reference[$lang]))
			return $this->reference[$lang];		
	}
	public function setAuthor($author, $lang="ru")
	{
		$this->author[$lang] = $author;		
	}
	public function getAuthor($lang="ru")
	{
		if(isset($this->author[$lang]))
			return $this->author[$lang];		
	}
	public function setTitle($title, $lang="ru")
	{
		$this->title[$lang] = $title;		
	}
	public function getTitle($lang="ru")
	{
		if(isset($this->title[$lang]))
			return $this->title[$lang];		
	}
	public function setPlaces($places, $lang="ru")
	{
		$this->places[$lang] = $places;		
	}
	public function getPlaces($lang="ru")
	{
		if(isset($this->places[$lang]))
			return $this->places[$lang];		
	}
	public function setKeyWords($keyWords, $lang="ru")
	{
		$this->keyWords[$lang] = $keyWords;		
	}
	public function getKeywords($lang="ru")
	{
		//print_r($this->keyWords);
		if(isset($this->keyWords[$lang]))
			return $this->keyWords[$lang];		
	}

	public function getWpPageId($lang="ru")
	{
		if(isset($this->wpPage[$lang]))
			return $this->wpPage[$lang];	
	}
	
	public function setWpPageId($wpPage, $lang="ru")
	{
		$this->wpPage[$lang] = $wpPage;		
	}

	public function getSection($lang="ru", $plural = false)
	{		
		//$plural = ($plural) ? 1 : 0;
		if(isset($this->section[$lang][$plural]))
			return $this->section[$lang][$plural];	
	}
	
	public function setSection($section, $lang="ru", $plural = false)
	{
		$this->section[$lang][$plural] = $section;		
	}

	public function getWpContent($lang="ru")
	{
		if(isset($this->wpContent[$lang]))
			return $this->wpContent[$lang];	
	}

	public function setWpContent($wpContent, $lang="ru")
	{
		$this->wpContent[$lang] = $wpContent;		
	}

	public function setAuthorContents($authorContents, $lang="ru")
	{
		$this->authorContents[$lang] = $authorContents;		
	}

	public function getAuthorContents($lang="ru")
	{
		if(isset($this->authorContents[$lang]))
			return $this->authorContents[$lang];	
	}

	public function getAuthorArray($lang="ru")
	{
		//print_r($this->author);
		$authorStr = $this->getAuthor($lang);				
		$authorArray = explode(", ",$authorStr);
		foreach ($authorArray AS $author)
		{			
			preg_match("/^(.*?)([\d,]+)?$/", $author, $matches);
			$authors[] = $matches;
		}
		
		return $authors;
	}

	public function getPlacesArray($lang)
	{
		$placesStr = $this->getPlaces($lang);		
		//$placesArr = explode("\n\r", $placesStr);
		$placesArr = explode("\n", $placesStr);
		//$placesArr = array_combine(range(1, count($placesArr)), $placesArr);		
		foreach($placesArr AS $key => $value)
		{			
			$pattern = "^([0-9]{1,2})"; 
			$value = mb_ereg_replace($pattern, "", $value);
			if(trim($value))
			$placesReturnArray[] = $value;
			//$placesReturnArray[] = ltrim  ($value, $key);
			//$placesReturnArray[] = str_replace ($key, "", $value);
		}
		if(is_array($placesReturnArray))
		{
		$placesReturnArray = array_combine(range(1, count($placesReturnArray)), $placesReturnArray);			
		return $placesReturnArray;
		}
		return null;
	}
	public function getReferenceArray($lang)
	{
		$referenceStr = $this->getReference($lang);
		$referenceArray = explode("\n\r",$referenceStr);	
		return $referenceArray;
	}


}