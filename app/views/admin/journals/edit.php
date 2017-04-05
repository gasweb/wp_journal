<div class="tibl-admin">
<h2>Редактировать журнал Тибл</h2>

<?php echo $this->form->create($model->name); ?>
<?php echo $this->form->input('active'); ?>
<?php echo $this->form->input('number'); ?>
<?php echo $this->form->input('year'); ?>
<?php echo $this->form->input('volume'); ?>
<?php echo $this->form->input('link_contents'); ?>
<?php echo $this->form->input('link_contents_en'); ?>
<?php echo $this->form->input('pdf_link'); ?>
<?php echo $this->form->end('Редактировать'); ?>
<hr>
<?php
if(!empty($this->object->pdf_link))
{
	?>
	<h4>Журнал PDF</h4>	
	<object style="display:none;" data="<?=$this->object->pdf_link?>#page=100" type="application/pdf" width="100%" height="900px">
  <p>Alternative text - include a link <a href="<?=$this->object->pdf_link?>">to the PDF!</a></p>
</object>
	<?php

/*
$id = 3;
$MvcArticleService = new Magazine\Service\MvcArticleService($id);
$MVCArticle = $MvcArticleService->getArticle();       
$Article = new Magazine\Article\WpMvcArticle($MVCArticle);       
$MVCJournal = $MvcArticleService->getJournal($Article->getJournalId());
$Journal = new Magazine\Journal\WpMvcJournal($MVCJournal);

    function generateDoi($Journal, $Article)
    {
        //DOI 10.21292/2075-1230-2016-94-4-6-12
        $year = $Journal->getYear();
        $vol = $Journal->getVolume();
        $number = $Journal->getNumber();
        $pageStart = $Article->getPageStart();
        $pageEnd = $Article->getPageEnd();
        return "10.21292_2075-1230-$year-$vol-$number-$pageStart-$pageEnd";
    }

*/




}
?>
</div>

