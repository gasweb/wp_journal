<div class="tibl-admin">
<a href="http://new.tibl-journal.com/wp-admin/admin.php?page=mvc_articles-add">Добавить статью</a>
<h2>Edit Article</h2>
<pre>
<?//=print_r($object) ?>
</pre>
<?php echo $this->html->link('Посмотреть на сайте', "/article/$object->id"); ?>
<?php //echo $this->html->link('Посмотреть на сайте', "$this->object"); ?>

<?php echo $this->form->create($model->name); ?>
<?php 
echo $this->form->belongs_to_dropdown('journal', $journals, array('style' => 'width: 200px;', 'empty' => false, 'label' => 'Выберите журнал'));
?>
<?php 
echo $this->form->belongs_to_dropdown('section', $sections, array('style' => 'width: 200px;', 'empty' => false, 'label' => 'Выберите cекцию'));
?>
<?php echo $this->form->input('doi',
	array('label' => 'Введите индекс DOI')
); ?>
<?php echo $this->form->input('udk', array('label' => 'УДК', 'class' => 'tibl-admin-input-text')); ?>
<?php echo $this->form->input('title', 
array('label' => 'Заголовок статьи на русском')); ?>
<?php /*echo $this->form->input('pages_str', 
array('label' => 'Диапазон страниц статьи')
);*/ ?>
<?php echo $this->form->input('title_en', 
array('label' => 'Заголовок статьи на англ.')); ?>
<?php echo $this->form->input('author_contents', 
array('label' => 'Авторы содержания на русском')); ?>
<?php echo $this->form->input('author_contents_en', 
array('label' => 'Авторы содержания на английском')); ?>
<hr>
<?php echo $this->form->input('author', 
array('label' => 'Авторы статьи на русском')); ?>
<?php echo $this->form->input('places', 
array('label' => 'Места работы на русском')); ?>
<?php echo $this->form->input('article_text', 
array('label' => 'Текст статьи на русском')); ?>
<?php echo $this->form->input('key_words', 
array('label' => 'Ключевые слова на русском')); ?>
<?php echo $this->form->input('author_en', 
array('label' => 'Авторы статьи на английском')); ?>
<?php echo $this->form->input('places_en', 
array('label' => 'Места работы на англ.')); ?>
<?php echo $this->form->input('article_text_en', 
array('label' => 'Текст статьи на англ.')); ?>
<?php echo $this->form->input('key_words_en', 
array('label' => 'Ключевые слова на англ.')); ?>
<?php echo $this->form->input('reference', 
array('label' => 'Список литературы на  русском')); ?>
<?php echo $this->form->input('reference_en', 
array('label' => 'Список литературы на англ.')); ?>
<div class="jumbotron">
<?php echo $this->form->input('pdf_link', 
array('label' => 'Link to PDF file')); ?>
<?php echo $this->form->input('page_start', 
array('label' => 'Страница начала статьи в журнале')); 
?>
<?php echo $this->form->input('page_end', 
array('label' => 'Страница окончания статьи в журнале')); ?>
</div>

<?php echo $this->form->end('Редактировать статью'); ?>
</div>
<pre>
<?php
print_r();
?>
</pre>