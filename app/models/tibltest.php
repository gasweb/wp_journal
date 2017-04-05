<?php

class TiblTest extends MvcModel {

    var $table = 'tibl-test';
	var $primary_key = 'id';	
}
/*
INSERT INTO `tibl-test`(`id`, `wp_page_id`, `wp_page_id_en`, `year`, `number`, `section`, `page_start`, `page_end`, `title`, `title_en`, `post_title`, `post_title_en`, `authors`, `authors_en`, `post_content`, `post_content_en`)
SELECT `tibl_old`.`id`, `tibl_old`.`wp_page_id`, `tibl_old`.`wp_page_id_en`, `tibl_old`.`year`, `tibl_old`.`number`, `tibl_old`.`section`, `tibl_old`.`page_start`, `tibl_old`.`page_end`, `tibl_old`.`title`, `tibl_old`.`title_en`, `tibl_old`.`post_title`, `tibl_old`.`post_title_en`, `tibl_old`.`authors`, `tibl_old`.`authors_en`, `tibl_old`.`post_content`, `tibl_old`.`post_content_en` FROM `tibl_old`

INSERT INTO tbl_temp2 (fld_id)
  SELECT tbl_temp1.fld_order_id
  FROM tbl_temp1 WHERE tbl_temp1.fld_order_id > 100
*/
?>