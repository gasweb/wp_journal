<h1 class="center">«<?= Magazine\Locale::getText("journal_title",$lang); ?>»  </h1>
<h2 class="center"><?= Magazine\Locale::getText("journal_archive",$lang); ?></h2>
<?php
//print_r($archive);
$langSrc = ($lang=="ru") ? "/journal/" : "/en/journal/";
foreach($archive AS $year =>$yearArchive)
{
	if(!empty($yearArchive) && (is_array($yearArchive) && count($yearArchive)>1)){
	?>
	<h3><?=$year?></h3>
	<ul>
	<?php
	foreach ($yearArchive as $key => $archiveJournal) {
		
		/*Если текущий номер, то не выводим его*/
		if($year == date("Y") && $key == 0)
			continue;
		?><li>
			<a href="<?=$langSrc?><?=$archiveJournal->id?>/<?=$archiveJournal->number?>-<?=$archiveJournal->year?>">
				№<?=$archiveJournal->number ?>
			</a>
		</li><?php
		
	}
	?></ul><?php
}
}
?>
<?php
$archive_link_ru =  "/archive";
$archive_link_en =  "/en/archive-en";
?>
<input type="hidden" name="lang_url_ru" id="lang_url_ru" value="<?=$archive_link_ru?>">
<input type="hidden" name="lang_url_en" id="lang_url_en" value="<?=$archive_link_en?>">