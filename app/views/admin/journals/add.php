<div class="tibl-admin">
<h2>Добавить Журнал Тибл</h2>

<?php echo $this->form->create($model->name); ?>
<?php echo $this->form->input('number'); ?>
<?php echo $this->form->input('year'); ?>
<?php echo $this->form->input('volume'); ?>
<?php echo $this->form->input('link_contents'); ?>
<?php echo $this->form->input('link_contents_en'); ?>
<?php echo $this->form->input('pdf_link'); ?>
<?php echo $this->form->end('Add'); ?>

</div>