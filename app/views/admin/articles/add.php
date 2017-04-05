
<div class="tibl-admin">
	<h2>Добавить статью</h2>
	<pre>
	<?php
	//print_r($journals);
	?>
	</pre>
	<?php echo $this->form->create($model->name); ?>
	<?php 
	echo $this->form->belongs_to_dropdown('journal', $journals, array('style' => 'width: 200px;', 'empty' => false, 'label' => 'Выберите журнал'));
	?>
	<?php 
	echo $this->form->belongs_to_dropdown('section', $sections, array('style' => 'width: 200px;', 'empty' => false, 'label' => 'Выберите cекцию'));
	?>
	<?php /*echo $this->form->input('doi',
		array('label' => 'Введите индекс DOI')
	); */?>
	<?php /*echo $this->form->input('udk', array('label' => 'УДК', 'class' => 'tibl-admin-input-text')); */?>
	<br/>
	<h4> СОДЕРЖАНИЕ / ЗАГОЛОВОК-АВТОРЫ: </h4>
	<?php echo $this->form->input('title', 
	array('label' => 'Заголовок статьи Рус')); ?>
	
	<?php echo $this->form->input('author_contents',
	array('label' => 'Авторы содержания Рус')); ?>
	
	<?php /*echo $this->form->input('pages_str', 
	array('label' => 'Диапазон страниц статьи')
	);*/ ?>
	
	<?php echo $this->form->input('title_en', 
	array('label' => 'Заголовок статьи Eng.')); ?>
	<?php echo $this->form->input('author_contents_en', 
	array('label' => 'Авторы содержания Eng')); ?>
	<br/>
	<h4> СТАТЬЯ (резюме) </h4>
	<br/>
	<h4> Авторы </h4>
	<?php echo $this->form->input('author', 
	array('label' => 'Авторы в резюме Рус')); ?>
	<?php echo $this->form->input('author_en', 
	array('label' => 'Авторы в резюме Eng')); ?>
	<h4>Места работы </h4>
	<?php echo $this->form->input('places', 
	array('label' => 'Место работы Рус')); ?>
	<?php echo $this->form->input('places_en', 
	array('label' => 'Место работы Eng.')); ?>
	<h4> Текст статьи (резюме) </h4>
	<?php echo $this->form->input('article_text', 
	array('label' => 'Текст статьи на русском')); ?>
	<?php echo $this->form->input('article_text_en', 
	array('label' => 'Текст статьи на англ.')); ?>
	<br/>
	<h4> КЛЮЧЕВЫЕ СЛОВА </h4>
	<br/>
	<?php echo $this->form->input('key_words', 
	array('label' => 'Ключевые слова Рус')); ?>
	<?php echo $this->form->input('key_words_en', 
	array('label' => 'Ключевые слова Eng.')); ?>
	<br/>
	<h4> ЛИТЕРАТУРА </h4>
	<br/>
	<?php echo $this->form->input('reference', 
	array('label' => 'Список литературы Рус')); ?>
	<?php echo $this->form->input('reference_en', 
	array('label' => 'Список литературы Eng.')); ?>
	<?php //echo $this->form->input('pdf_link'); ?>
	<?php //echo $this->form->input('update'); ?>
			<div style="    position: fixed;
				right: 20px;
				top: 83px;
				border: 1px solid #32373C;
				padding: 20px;
				height: 200px;
				background: #32373C; color: #fff;">
			<?php echo $this->form->input('page_start', 
			array('label' => 'Страница начала статьи в журнале')); 
			?>
			<?php echo $this->form->input('page_end', 
			array('label' => 'Страница окончания статьи в журнале')); ?>
			<?php echo $this->form->end('Добавить статью'); ?>
			</div>

</div>
