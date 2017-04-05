<?php
namespace Magazine\Article;

use \Magazine\TiblMemberShip;

class ArticleTemplate
{
	public $id;
	public $journal_title;
	public $vol;
	public $year;
	public $number;
	public $contents_link;
	public $lang;

	public $udk;
	public $doi;
	public $title;
	public $section_id;
	public $section;
	public $author_str;
	public $author_arr;
	public $places_str;
	public $places_arr;
	public $article_text;
	public $key_words;
	public $pdf_link;
	public $reference_str;
	public $reference_arr;
	public $page_str;
	public $page_start;

	public function __construct(
		WpMvcArticle $Article, 
		\Magazine\Journal\WpMvcJournal $Journal, 
		$lang)
	{
		$this->Article = $Article;
		$this->Journal = $Journal;
		$this->journal_id = $this->Journal->getId();
		$this->lang = $lang;
		$this->id = $Article->getId();
		$this->udk = $Article->getUdk();
		$this->doi = $Article->getDoi();
		$this->section_id = $Article->getSectionId();
		if(!$this->doi)
			$this->generateDoi();
		$this->pdf_link = $Article->getPdfLink();
		$this->title = $Article->getTitle($lang);
		$this->wp_content = $Article->getWpContent($lang);
		$this->author_contents_str = $Article->getAuthorContents($lang);
		$this->author_str = $Article->getAuthor($lang);
		$this->author_arr = $Article->getAuthorArray($lang);
		$this->places_str = $Article->getPlaces($lang);
		$this->places_arr = $Article->getPlacesArray($lang);
		$this->article_text = $Article->getArticleText($lang);
		$this->key_words = $Article->getKeywords($lang);
		$this->reference_str = $Article->getReference($lang);
		$this->reference_arr = $Article->getReferenceArray($lang);
		$this->page_str = $Article->getPageStr();
		$this->page_start = $Article->getPageStart();
		$this->page_end = $Article->getPageEnd();
		$this->Journal = $Journal;
		$this->vol = $Journal->getVolume();
		$this->year = $Journal->getYear();
		$this->number = $Journal->getNumber();		
		$this->journal_pdf = $Journal->getPdfLink();		
		$this->contents_link = $Journal->getLinkContents($lang);
		$this->section = $Article->getSection($lang);
		$this->section_plural = $Article->getSection($lang, true);
		
		$this->title = str_replace($this->page_start, "", $this->title);	
		/*if(!$this->pdf_link && $this->journal_pdf)
			$this->pdf_link = $this->journal_pdf;		*/
	}

	public function admin_article_render() {
	global $wp_admin_bar;	
	$editLink = "/admin.php?page=mvc_articles-edit&id=".$this->id;
	$wp_admin_bar->add_menu( array(
		'parent' => false, // use 'false' for a root menu, or pass the ID of the parent menu
		'id' => 'edit-article', // link ID, defaults to a sanitized title value
		'title' => "Редактировать статью", // link title
		'href' => admin_url($editLink), // name of file
		'meta' => false 
		// array of any of the following options: array( 'html' => '', 'class' => '', 'onclick' => '', target => '', title => '' );
	));
	}


	public function generateDoi()
	{
		$this->doi = \Magazine\Service\JournalService::generateDoi($this->Journal, $this->Article);		
	}

	public function showCiteStr()
	{
		?><hr><div class="cite"><?php
		echo \Magazine\Locale::getText("for_cite",$this->lang).": ";		
		//echo $this->showAuthorsByArray(false)." ";
		echo $this->author_contents_str." ";
		echo $this->title." ";
		echo "«".\Magazine\Locale::getText("journal_title",$this->lang)."» ";
		echo $this->year."; ".$this->vol."($this->number):$this->page_start-$this->page_end".". ";
		if($this->doi){
		echo \Magazine\Locale::getText("doi",$this->lang); ?> : 
		<?=$this->doi ?>	
		<?php
		}
		?>
		</div><hr>
		<?php

	}

	public function showAuthorsByArray($places=true)
	{		
		if(is_array($this->author_arr))
			{
				/*Устанавливаем текущим элементом последний элемент массива*/
				end($this->author_arr);
				/*Получаем текущий ключ элмента массива и сохраняем его*/
				$last = key($this->author_arr);
				/*Перебираем по ключам и массивам*/
				foreach ($this->author_arr as $key => $person) {
					?>
					<span class="author_fio"><?=$person[1]?></span>
					<?php if($places){ ?> 
					<sup class="author_places"><?=$person[2]?></sup>
					<?php }
					
					
					/*Если текущий ключ элемента массива равен последнему, который мы закешировали до этого, то все круто.*/
					if($key != $last){
					?>
					<span>,</span>
					<?php
					}
				}
			}
	}

	public function showPlacesByArray()
	{		
		//print_r($this->places_arr);
		if(is_array($this->places_arr))
			{
				?>
				<ul class="places-list">
				<?php
				foreach($this->places_arr AS $key => $place)
				{
					?>
					<li>					
						<span class="places-value">
						<?php
							if(count($this->places_arr) > 1)
								echo "<sup>$key</sup>";
						?>
							<?=$place?>
						</span>
					</li>
					<?php
				}
				?>
				</ul>
				<?php
			}
	}

	public function showReferencesByArray()
	{
		//print_r($this->reference_arr);
		if(is_array($this->reference_arr))
			{
				?>
				<ul class="reference-list list-unstyled">
				<?php
				foreach($this->reference_arr AS $key => $reference)
				{
					?>
					<li>					
						<span class="reference-value">
							<?=$reference?>
						</span>
					</li>
					<?php
				}
				?>
				</ul>
				<?php
			}
	}

	public function showReference()
	{
		//if(is_array($this->reference_arr[0])){			
		if(is_array($this->reference_arr) && $this->reference_arr[0]){				
		?>
		<div class="reference-container">
		<h3><?= \Magazine\Locale::getText("reference",$this->lang);?></h3>
			<?=$this->showReferencesByArray() ?>
		</div>
		<?php
		}
		elseif(is_string($this->reference))
		{
			?>
		<div class="reference-container">
		<?=$this->reference ?>
		</div>
		<?php
		}
	}

	public function showKeyWords()
	{
		if($this->key_words){
		?>
		<p class="key_words"> 
		<?=\Magazine\Locale::getText("key_words",$this->lang);?>: 
		<?=$this->key_words?>
		</p>
		<?php
	}
	}

	/**
	 * Возвращает содержимое статьи страницы в параграфе
	 * 
	 **/
	public function showArticle()
	{	
		if(!empty($this->article_text))
		{			
			?>
			<p class="article_text"><?=wpautop(nl2br($this->article_text))?></p>
			<?php
		}
		elseif(!empty($this->wp_content) && $this->wp_content != "NULL")
		{
			?>
			<p class="article_text"><?=wpautop(nl2br($this->wp_content))?></p>
			<?php
		}

	}

	/**
	 * Возвращает УДК в параграфе
	 * 
	 **/
	public function showUdc()
	{
		if($this->udk)
		{
		?>
		<p>
		<?= \Magazine\Locale::getText("udc",$this->lang); ?> : 
		<?=$this->udk ?>
		</p>
		<?php
		}
	}

	/**
	 * Возвращает индекс DOI в параграфе
	 **/
	public function showDoi()
	{
		if($this->doi)
		{
		?>
		<p>
		<?= \Magazine\Locale::getText("doi",$this->lang); ?> : 
		<?=$this->doi ?>
		</p>
		<?php
		}
	}

	public function showPdf()
	{		
	if($this->id)
	{
	if(TiblMemberShip::canWatchPdf($this->year, $this->number))
	{
		if(!$this->pdf_link && $this->journal_pdf)
			$pdf_href = "/wp-content/uploads/journals/$this->journal_pdf"."#page=".$this->page_start;
		elseif($this->pdf_link) $pdf_href = "/wp-content/uploads/journals/$this->year/$this->number/".$this->pdf_link;
		?>
	<div class="pdf-container">
	<object data="<?=$pdf_href?>" type="application/pdf" width="100%" height="600px">
	<a href="<?=$pdf_href?>">
		<?=$this->title?>
	</a>
	</object>
	</div>
		<?php
	}
	elseif(\SwpmMemberUtils::is_member_logged_in())
	{
		?>
			Для получения подписки свяжитесь с нами!
		<?php
	}
	else
		{						
			?>			
			<div style="width: 100%; min-height: 300px; text-align: left;">
				<h3>Для доступа нужна подписка. Войдите в систему для подтверждения ее наличия. </h3>
				<?=do_shortcode("[swpm_login_form]");?>
			</div>
			<?php
		}

	?>
	<?php
	}
		}



}