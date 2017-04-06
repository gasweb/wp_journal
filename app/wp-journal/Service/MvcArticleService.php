<?php
namespace Magazine\Service;

class MvcArticleService
{
	public function getJournal($id)
    {       
       $Journal = mvc_model('Journal');
        return $Journal->find_by_id(array(
            'id' => $id,
            'order' => 'Journal.page_start ASC',
            ));        
    }

    public function getArticle($id)
    {        
    	$Article = mvc_model('Article');
        return $Article->find_by_id(array(
            'id' => $id,      
            ));
    }

    public function getArticlesByJournal($id)
    {
        $Article = mvc_model('Article');
        return $Article->find_by_journal_id(array(
            'journal_id' => $id,      
            ));
    }

    public function getNewIssueId()
    {        
         $JournalModel = mvc_model('Journal');
        $Journal = $JournalModel->find_one(
            array(
        'conditions' => array(
                'active' => 1                
            ),        
        'selects' => array('Journal.id, Journal.number, Journal.year'),
        'order' => 'Journal.volume DESC, Journal.number DESC',        
        ));
        return $Journal;
    }

    
    public function setArticle()
    {
        $Article = mvc_model('Article');
         $object = $this->params['data']['Venue'];
      if (empty($object['id'])) {
        $this->Venue->create($this->params['data']);
        $id = $this->Venue->insert_id;
        $url = MvcRouter::admin_url(array('controller' => $this->name, 'action' => 'edit', 'id' => $id));
        $this->flash('notice', 'Successfully created!');
        $this->redirect($url);
      }
    }
}