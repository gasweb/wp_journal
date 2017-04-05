<?php

class AdminArticlesController extends MvcAdminController {
    
   // var $default_columns = array('title', 'year');
	
	 var $default_search_joins = array('Journal');
	 var $default_searchable_fields = array('Journal.number');
	 var $default_columns = array(
	    'id',
	    'title' => 'Название',
	    'Год' => array('value_method' => 'admin_journal_year'),
	    'Номер' => array('value_method' => 'admin_journal_number'),
	  );

	  public function admin_journal_year($object)
	  {
	  	return empty($object->journal->year) ? null : $object->journal->year;
  		}
	  public function admin_journal_number($object)
	  {
	  	return empty($object->journal->number) ? null : $object->journal->number;
  		}

	 public function edit() {
	 	if ( !is_super_admin() ) die();
	    if (!empty($this->params['data']) && !empty($this->params['data']['Article'])) {
	      $object = $this->params['data']['Article'];
	     // /**/ print_r($object);
	     //$object = (object) $object;
	     //echo $object->author;

	     //$object['author'] = "FISKOV!";


//	      die;
	      //if ($this->Article->save($this->params['data'])) {
	      if ($this->Article->save($object)) {
	        $this->flash('notice', 'Статья успешно сохранена!');
	        $this->refresh();
	      } else {
	        $this->flash('error', $this->Article->validation_error_html);
	      }
	    }
	    $this->set_journals();
	    $this->set_sections();
	    $this->set_object();
	  }

	  public function add() {
	  	if ( !is_super_admin() ) die();
	    if (!empty($this->params['data']) && !empty($this->params['data']['Article'])) {
	      $object = $this->params['data']['Article'];
	      if (empty($object['id'])) {

	      	print_r($this->params['data']);
	      //	die;

	        $this->Article->create($this->params['data']);
	        $id = $this->Article->insert_id;
	        $url = MvcRouter::admin_url(array('controller' => $this->name, 'action' => 'edit', 'id' => $id));
	        $this->flash('notice', 'Статья успешно создана!');
	        $this->redirect($url);
	      }
	     
	      $this->set_object();
	       
	    }
	    $this->set_journals();
	    $this->set_sections();
	  }

  
  
  private function set_journals() {
    $Journal = $this->load_model('Journal');
    

    /*$journals = $this->Journal->find(array('selects' => array('id', 'Concat(year," №", number) AS name')));   */
    $journalsArray = $this->Journal->find(
    	array('selects' => array('id', 'year', 'number'),
    		'order' => 'Journal.year DESC',
    		'conditions' => array(
		      	"Journal.active" => 1,		      	
		      	)

    		));   
    
    foreach ($journalsArray as $Journal) 
    {
    	$journalFormArray[$Journal->id] = $Journal->year." №".$Journal->number;
    }
     $this->set('journals', $journalFormArray);
  }

  private function set_sections() {
    $Section = $this->load_model('Section');
    

    /*$journals = $this->Journal->find(array('selects' => array('id', 'Concat(year," №", number) AS name')));   */
    $sectionsArray = $this->Section->find(array('selects' => array('id', 'section')));   
    foreach ($sectionsArray as $Section) 
    {
    	$sectionsFormArray[$Section->id] = $Section->section;
    }
     $this->set('sections', $sectionsFormArray);
  }

}

?>
