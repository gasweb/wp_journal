<?php

class Journal extends MvcModel {

    var $display_field = 'number, year';
    var $table = 'tibl_journals';
    //var $selects = array('id', 'number, year');
    var $order = 'Journal.year DESC, Journal.number DESC';
}

?>