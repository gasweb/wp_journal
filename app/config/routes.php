<?php
/*
MvcRouter::public_connect('/article/{:id:[\d]+}/?', array('controller' => 'article', 'action' => 'info'));
MvcRouter::public_connect('/far', array('controller' => 'article', 'action' => 'info'));

MvcRouter::public_connect('en/id/{:id:[\d]+}/?', array('controller' => 'articles', 'action' => 'show'));
*/

/*MvcRouter::public_connect('en/{:year:[\d]+}/{:vol:[\d]+}/{:id:[\d]+}/{:alias:[a-z-]+}?', array('controller' => 'articles', 'action' => 'show'));*/

/*
Doesn't work
MvcRouter::public_connect('en/{:year:[\d]+}/{:volume:[\d]+}/{:id:[\d]+}/?', array('controller' => 'articles', 'action' => 'showEn'));
MvcRouter::public_connect('{:year:[\d]+}/{:volume:[\d]+}/{:id:[\d]+}/?', array('controller' => 'articles', 'action' => 'show'));*/

MvcRouter::public_connect('en/{:year:[\d]+}/{:volume:[\d]+}/{:id:[\d]+}/?', array('controller' => 'articles', 'action' => 'showEn'));
MvcRouter::public_connect('{:year:[\d]+}/{:volume:[\d]+}/{:id:[\d]+}/?', array('controller' => 'articles', 'action' => 'show'));

MvcRouter::public_connect('article/{:id:[\d]+}.*', array('controller' => 'articles', 'action' => 'show'));
MvcRouter::public_connect('en/article/{:id:[\d]+}.*', array('controller' => 'articles', 'action' => 'show_en'));
MvcRouter::public_connect('journal/{:id:[\d]+}/.*', array('controller' => 'journals', 'action' => 'contents'));
MvcRouter::public_connect('en/journal/{:id:[\d]+}/.*', array('controller' => 'journals', 'action' => 'contents_en'));

MvcRouter::public_connect('new-issue', array('controller' => 'journals', 'action' => 'new_issue'));
MvcRouter::public_connect('en/new-issue-en', array('controller' => 'journals', 'action' => 'new_issue_en'));

MvcRouter::public_connect('archive', array('controller' => 'journals', 'action' => 'archive'));
MvcRouter::public_connect('en/archive-en', array('controller' => 'journals', 'action' => 'archive_en'));

MvcRouter::public_connect('dev', array('controller' => 'articles', 'action' => 'dev'));
?>