<?php

class AdminJournalsController extends MvcAdminController {
    
    var $default_columns = array('year', 'number', 'link_contents', 'link_contents_en');

    public function pdf()
    {
    	echo "I m pdf";
    }
}

?>