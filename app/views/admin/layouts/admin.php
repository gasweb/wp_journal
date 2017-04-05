<link rel="stylesheet" href="<?= mvc_css_url('tibl-journal', 'admin'); ?>">
<?php $this->render_main_view(); ?>
<script type="text/javascript">
	jQuery(document).ready(function () 
	{
    	var keywords = jQuery("#ArticleKeyWordsEn");
		console.log(keywords);
	}); 
</script>