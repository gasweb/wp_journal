<?php
namespace Magazine\Journal;

class Journal
{
	private $id;
	private $number;
	private $volume;
	private $year;
	private $linkContents;
	private $dateUpdate;
	private $pdfLink;

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNumber(){
		return $this->number;
	}

	public function setNumber($number){
		$this->number = $number;
	}

	public function getVolume(){
		return $this->volume;
	}

	public function setVolume($volume){
		$this->volume = $volume;
	}

	public function getYear(){
		return $this->year;
	}

	public function setYear($year){
		$this->year = $year;
	}

	public function getLinkContents($lang="ru"){		
		if(isset($this->linkContents[$lang]))
			return $this->linkContents[$lang];	
	}

	public function setLinkContents($linkContents, $lang="ru"){
		$this->linkContents[$lang] = $linkContents;	
	}

	public function getDateUpdate(){
		return $this->date_update;
	}

	public function setDateUpdate($date_update){
		$this->date_update = $date_update;
	}

	public function getPdfLink(){
		return $this->pdfLink;
	}

	public function setPdfLink($pdfLink){
		$this->pdfLink = $pdfLink;
	}
}