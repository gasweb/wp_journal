<?php
/*
Plugin Name: Fiot Journal
Plugin URI: 
Description: Плагин для журналов, издаваемых компанией ФИОТ («Туберкулез и болезни легких», «Вестник анестизиологии и реаниматологии»)
Author: Igor Sinitsyn
Version: 1.0
Author URI: 
*/
require_once('vendor/autoload.php');
register_activation_hook(__FILE__, 'wp_journal_activate');
register_deactivation_hook(__FILE__, 'wp_journal_deactivate');

function wp_journal_activate() {
    global $wp_rewrite;
    require_once dirname(__FILE__).'/wp_journal_loader.php';
    $loader = new FiotJournalLoader();
    $loader->activate();
    $wp_rewrite->flush_rules( true );
}

function wp_journal_deactivate() {
    global $wp_rewrite;
    require_once dirname(__FILE__).'/wp_journal_loader.php';
    $loader = new FiotJournalLoader();
    $loader->deactivate();
    $wp_rewrite->flush_rules( true );
}

?>