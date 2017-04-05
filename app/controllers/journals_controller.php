<?php
use Magazine\Service\MvcArticleService;
use Magazine\Article\ArticleTemplate;
use Magazine\Article\WpMvcArticle;
use Magazine\Journal\WpMvcJournal;
use \Magazine\PageMetaInfo;

class JournalsController extends MvcPublicController {
    
    public function contents($lang="ru")
    {
        $MvcArticleService = new MvcArticleService();
        $Journal = new WpMvcJournal($MvcArticleService->getJournal($this->params['id']));
        \Magazine\PageMetaInfo::setTitle("№".$Journal->getNumber()." (".$Journal->getYear().")");   
        $this->set("Articles", $this->getArticlesForContents($lang));
        $this->set("lang", $lang);
        $this->set("Journal", $Journal);                     
    }
        public function contents_en()
        {
        	$this->contents("en");       	
        }
	
	public function archive($lang="ru")
	    {	          
            PageMetaInfo::setTitle(\Magazine\Locale::getText("journal_archive", "ru"));     
	    	$this->set("archive", $this->getAllArchive());
            $this->set("lang", $lang);
	    }
		
	public function archive_en()
		    {
                $this->archive("en");
		    }

    public function new_issue($lang="ru")
    {
        $Journal = $this->getNewIssue();
        if($lang == "ru")
        header("Location: /journal/$Journal->id/$Journal->number-$Journal->year");
        elseif($lang == "en")
        header("Location: /en/journal/$Journal->id/$Journal->number-$Journal->year");
    }
    
    public function new_issue_en()
    {
        $this->new_issue("en");
    }

    private function getArticlesForContents($lang="ru")
    {
        $journalId = $this->params['id'];
        if($journalId>0)
        {
            $MvcArticleService = new MvcArticleService();
            $Journal = new WpMvcJournal($MvcArticleService->getJournal($journalId));
            $articles = $MvcArticleService->getArticlesByJournal($journalId);
            foreach($articles AS $Article)
            {               
                $Articles[] = new ArticleTemplate(new WpMvcArticle($Article), $Journal, $lang); 
            }
            return $Articles;

        }
    }

   private function getNewIssue($lang="ru")
    {

        $MvcArticleService = new MvcArticleService();

    	return $MvcArticleService->getNewIssueId();

    }

    private function getAllArchive()
    {
    	$currentYear = (int) date("Y");
    	for($year=$currentYear; $year>2012; $year--){
    		$archive[$year] = $this->getArchive($year);    		
    	}
    	return ($archive);
    }

    private function getArchive($year)
    {
    		$Journal = mvc_model('Journal');
        	$objects = $Journal->find(array(
		      'selects' => array('Journal.id', 'Journal.number', 'Journal.year'),
		      'order' => 'Journal.number DESC',
		      'conditions' => array(
		      	"Journal.active" => 1,
		      	"Journal.year" => $year,
		      	)

		    ));            
		    return $objects;
    	
    }
}

?>