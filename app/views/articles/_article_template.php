<?php
if (is_super_admin()) add_action( 'wp_before_admin_bar_render', array( $ArticleTemplate, 'admin_article_render' ));
$article_link =  "/article/" . $ArticleTemplate->id . "/" . $ArticleTemplate->doi;
$article_link_en =  "/en/article/" . $ArticleTemplate->id . "/" . $ArticleTemplate->doi;
$journal_link_ru =  "/journal/" . $ArticleTemplate->journal_id . "/".$ArticleTemplate->number."-".$ArticleTemplate->year;
$journal_link_en =  "/en/journal/" . $ArticleTemplate->journal_id . "/".$ArticleTemplate->number."-".$ArticleTemplate->year."-en";
$journal_link = ($ArticleTemplate->lang == "ru") ? $journal_link_ru : $journal_link_en;
?>
<article id="post-tibl-<?=$ArticleTemplate->id?>" class="post-tibl-<?=$ArticleTemplate->id?> page type-page status-publish hentry" itemtype="http://schema.org/CreativeWork" itemscope="itemscope">
	<div class="inside-article">
<a href="<?=$journal_link?>">
	<?= Magazine\Locale::getText("back",$ArticleTemplate->lang); ?>
</a>
<section style="display: block; text-align: right;">
	<strong>
	«<?= Magazine\Locale::getText("journal_title",$ArticleTemplate->lang); ?>»
	<?= Magazine\Locale::getText("vol",$ArticleTemplate->lang); ?> 
	<?=$ArticleTemplate->vol?>, 
	№<?=$ArticleTemplate->number?>, 
	<?=$ArticleTemplate->year?>, <?=$ArticleTemplate->page_str?>
	<?php
	//print_r($ArticleTemplate);
	?>
	</strong>
	<div>
	<?=$ArticleTemplate->showUdc();?>		
	<?=$ArticleTemplate->showDoi();?>				
	</div>
</section>
<header class="entry-header">
<h1 class="entry-title" itemprop="headline"><?=$ArticleTemplate->title?></h1>
</header><!-- .entry-header -->
				
<div class="entry-content" itemprop="text">	
<div id="article-tabs" class="">	
<ul class="nav nav-pills">
			<li class="active">
        		<a  href="#abstract" data-toggle="abstract"><?= \Magazine\Locale::getText("abstract",$ArticleTemplate->lang); ?></a>
			</li>
			<li>
				<a href="#cite" data-toggle="cite"><?= \Magazine\Locale::getText("for_cite",$ArticleTemplate->lang); ?></a>
			</li>
			<li>
				<a href="#pdf" data-toggle="pdf"><?= \Magazine\Locale::getText("view",$ArticleTemplate->lang); ?></a>
			</li>

</ul>
</div>

			<div class="tab-content clearfix">
			  <div class="tab-pane active" id="abstract">
				<p class="author"><?=$ArticleTemplate->showAuthorsByArray();?></p>
				<?php
				$ArticleTemplate->showPlacesByArray();
				$ArticleTemplate->showArticle();
				$ArticleTemplate->showKeyWords();
				$ArticleTemplate->showReference();
				$ArticleTemplate->showCiteStr();
				?>
			</div>
				<div class="tab-pane" id="cite">
          			<?=$ArticleTemplate->showCiteStr();?>
				</div>        
				<div class="tab-pane" id="pdf">
          			<?=$ArticleTemplate->showPdf();?>
				</div>        
			</div>
  







		</div><!-- .entry-content -->
	</div><!-- .inside-article -->
</article>
<input type="hidden" name="lang_url_ru" id="lang_url_ru" value="<?=$article_link?>">
<input type="hidden" name="lang_url_en" id="lang_url_en" value="<?=$article_link_en?>">
<input type="hidden" name="page_title" id="page_title" value="<?=$ArticleTemplate->title?>">