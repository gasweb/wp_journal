<?php
use \Magazine\PageMetaInfo;

class ArticlesController extends MvcPublicController {
    public function show($lang="ru")
    {        
        $MvcArticleService = new Magazine\Service\MvcArticleService();
        $MVCArticle = $MvcArticleService->getArticle($this->params['id']);       
        $Article = new Magazine\Article\WpMvcArticle($MVCArticle);       
        $MVCJournal = $MvcArticleService->getJournal($Article->getJournalId());
        $Journal = new Magazine\Journal\WpMvcJournal($MVCJournal);

        $ArticleTemplate = new Magazine\Article\ArticleTemplate($Article, $Journal, $lang);
        /*Добавление названия страницы*/
        PageMetaInfo::setTitle($ArticleTemplate->title);
        $this->set('ArticleTemplate', $ArticleTemplate);        
    }

    public function show_en()
    {
        $this->show("en");      
    }

    public function dev()
    {
        
    }
}
