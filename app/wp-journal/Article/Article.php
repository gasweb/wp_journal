<?php
namespace Magazine\Article;

class Article
{
	private $id;
	private $journalId;
	private $doi;
	private $udk;
	private $title;
	private $title_en;
	private $author;
	private $author_en;
	private $places;
	private $keyWords;
	private $keyWords_en;
	private $reference;
	private $reference_en;
	private $articleText;
	private $articleText_en;
	private $pdfLink;
	private $pageStr;
	private $pageStart;
	private $pageEnd;
	private $wpContent;
	private $wpContent_en;
	private $section_id;
	private $section;
	private $section_en;
	private $wpPageId;
	private $wpPageId_en;
	private $update;

	
	public function getTemplateByLang()
	{
		return array();
	}

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getJournalId(){
		return $this->journalId;
	}

	public function setJournalId($journalId){
		$this->journalId = $journalId;
	}

	public function getDoi(){
		return $this->doi;
	}

	public function setDoi($doi){
		$this->doi = $doi;
	}

	public function getUdk(){
		return $this->udk;
	}

	public function setUdk($udk){
		$this->udk = $udk;
	}

	public function getTitle(){
		return $this->title;
	}

	public function setTitle($title){
		$this->title = $title;
	}

	public function getTitle_en(){
		return $this->title_en;
	}

	public function setTitle_en($title_en){
		$this->title_en = $title_en;
	}

	public function getAuthor(){
		return $this->author;
	}

	public function setAuthor($author){
		$this->author = $author;
	}

	public function getAuthor_en(){
		return $this->author_en;
	}

	public function setAuthor_en($author_en){
		$this->author_en = $author_en;
	}

	public function getPlaces(){
		return $this->places;
	}

	public function setPlaces($places){
		$this->places = $places;
	}

	public function getPlaces_en(){
		return $this->places;
	}

	public function setPlaces_en($places_en){
		$this->places_en = $places_en;
	}

	public function getKeyWords(){
		return $this->keyWords;
	}

	public function setKeyWords($keyWords){
		$this->keyWords = $keyWords;
	}

	public function getKeyWords_en(){
		return $this->keyWords_en;
	}

	public function setKeyWords_en($keyWords_en){
		$this->keyWords_en = $keyWords_en;
	}

	public function getReference(){
		return $this->reference;
	}

	public function setReference($reference){
		$this->reference = $reference;
	}

	public function getReference_en(){
		return $this->reference_en;
	}

	public function setReference_en($reference_en){
		$this->reference_en = $reference_en;
	}

	public function getArticleText(){
		return $this->articleText;
	}

	public function setArticleText($articleText){
		$this->articleText = $articleText;
	}

	public function getArticleText_en(){
		return $this->articleText_en;
	}

	public function setArticleText_en($articleText_en){
		$this->articleText_en = $articleText_en;
	}

	public function getSectionId(){
		return $this->sectionId;
	}

	public function setSectionId($sectionId){
		$this->sectionId = $sectionId;
	}

	public function getSection(){
		return $this->section;
	}

	public function setSection($section){
		$this->section = $section;
	}

	public function getSection_en(){
		return $this->section_en;
	}

	public function setSection_en($section_en){
		$this->section_en = $section_en;
	}

	public function getPdfLink(){
		return $this->pdf_link;
	}

	public function setPdfLink($pdf_link){
		$this->pdf_link = $pdf_link;
	}

	public function getPageStr(){
		return $this->pageStr;
	}

	public function setPageStr($pageStr){
		$this->pageStr = $pageStr;
	}

	public function getPageStart(){
		return $this->pageStart;
	}

	public function setPageStart($pageStart){
		$this->pageStart = $pageStart;
	}

	public function getPageEnd(){
		return $this->pageEnd;
	}

	public function setPageEnd($pageEnd){
		$this->pageEnd = $pageEnd;
	}
	public function getUpdate(){
		return $this->update;
	}

	public function setUpdate($update){
		$this->update = $update;
	}

	public function getWpContent(){
		return $this->wpContent;
	}

	public function setWpContent($wpContent){
		$this->wpContent = $wpContent;
	}

	public function getWpContent_en(){
		return $this->wpContent_en;
	}

	public function setWpContent_en($wpContent_en){
		$this->wpContent_en = $wpContent_en;
	}

	public function getWpPageId(){
		return $this->wpPageId;
	}

	public function setWpPageId($wpPageId){
		$this->wpPageId = $wpPageId;
	}

	public function getWpPageId_en(){
		return $this->wpPageId_en;
	}

	public function setWpPageId_en($wpPageId_en){
		$this->wpPageId_en = $wpPageId_en;
	}


}