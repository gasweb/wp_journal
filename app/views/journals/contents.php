<?php
use Magazine\Locale;
$langSrc = ($lang=="ru") ? "/article/" : "/en/article/";
?>
<h1 class="center">«<?= Magazine\Locale::getText("journal_title",$lang); ?>»  </h1>
<h2 class="center">№<?=$Journal->getNumber()?> (<?=$Journal->getYear()?>)</h2>
<div id="article-tabs" class="">	
<ul class="nav nav-pills">
			<li class="active">
        		<a  href="#contents" data-toggle="contents"><?= Magazine\Locale::getText("contents",$lang); ?></a>
			</li>
			<li>
				<a href="#pdf" data-toggle="pdf"><?=\Magazine\Locale::getText("view",$lang); ?></a>
			</li>

</ul>
</div>

			<div class="tab-content clearfix">
			  <div class="tab-pane active" id="contents">					
<h3 class="center"><?= Magazine\Locale::getText("contents",$lang); ?></h3>
<ul class="journal-contents">
<?php
if(is_array($Articles)){
$obj = new ArrayObject( $Articles );
$iterator = $obj->getIterator();



foreach($Articles AS $Article)
{
	$section[$Article->section_id][] = $Article->id;
}
//print_r($section);

foreach($iterator AS $Article)
{	
	if($lastSection != $Article->section_id){				
			$sectionName = (is_array($section[$Article->section_id]) && count($section[$Article->section_id]) > 1) ? $Article->section_plural : $Article->section;
		?>
		<li><hr><h3><?=$sectionName?></h3></li>
		<?php
	}
	?>
	<li class="article-li">
		<a href="<?=$langSrc?><?=$Article->id?>/<?=$Article->doi?>">
			<?=$Article->title?>
		</a>		
		<p><?=$Article->author_contents_str?></p>
	</li>
	<?php
	$lastSection = $Article->section_id;
}
}
?>
</ul>
<?php
$journal_link_ru =  "/journal/" . $Journal->getId() . "/".$Journal->getNumber()."-".$Journal->getYear();
$journal_link_en =  "/en/journal/" . $Journal->getId() . "/".$Journal->getNumber()."-".$Journal->getYear()."-en";
?>
</div>
			   
				<div class="tab-pane" id="pdf">
          			<?=$Journal->showPdf();?>
				</div>        
			</div>
<input type="hidden" name="lang_url_ru" id="lang_url_ru" value="<?=$journal_link_ru?>">
<input type="hidden" name="lang_url_en" id="lang_url_en" value="<?=$journal_link_en?>">

