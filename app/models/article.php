<?php
/*
@param $table Название таблицы в базе данных
@param $primary_key Первичный ключ таблицы
@param $belongs_to Настраиваем внешние связи с другими таблицами, при запросе статьи в объект будут приходить также поля, которые мы указали.
*/
class Article extends MvcModel {

    //var $display_field = 'doi, journal_id, doi';     
    var $table = 'tibl_articles';
    var $primary_key = 'id';
	  //var $includes = array('Journal', 'Section');
    var $order = 'Article.page_start ASC';

    var $belongs_to = array(
      'Journal' => array(
      'foreign_key' => 'journal_id',
      'join_table' => 'tibl_journals',
      'fields' => array('id', 'year', 'number')
      ),
      'Section' => array(
      'foreign_key' => 'section_id',
      'join_table' => 'tibl_article_sections',
      'fields' => array('id', 'section', 'section_en', 'section_plural', 'section_en_plural')
      )
    );
    
  function to_url($object) {
    $slug = $object->doi;
    $slug = preg_replace('/[^\w]/', '-', $slug);
    $slug = preg_replace('/[-]+/', '-', $slug);
    $slug = strtolower($slug);
    return 'article/'.$object->id.'/'.$slug.'/';
  }
}

?>