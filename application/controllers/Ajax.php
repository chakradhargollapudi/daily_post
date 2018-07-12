<?php
class Ajax extends Basecontroller{ //start
	 /**
	     * summary
	*/
    public function __construct()
    {
        parent::__construct();
         Session::init();

    }

	public function getMaintopic(){
		require 'application/models/masters_model.php';
       $mastermodel = new Masters_model();
       $subject = $_POST['subject'];
       //$selected_employee_id = $_POST['employee_id'];
       $topiclist = $mastermodel->getMainTopicsBySubjectId($subject);
       
        
      echo json_encode($topiclist);
	}
	
	public function getSubtopic(){
		require 'application/models/masters_model.php';
       $mastermodel = new Masters_model();
       $subject = $_POST['subject'];
	   $maintopic = $_POST['maintopic'];
       
	   $this->view->subject=$subject;	
       $topiclist = $mastermodel->getsubTopicsBySubjectId($maintopic);
       
        
      echo json_encode($topiclist);
	}
	
	public function gettoc(){
		
		require 'application/models/masters_model.php';
       $mastermodel = new Masters_model();
       $maintopic = $_POST['maintopic'];
       //$selected_employee_id = $_POST['employee_id'];
       $toc = $mastermodel->gettc($maintopic);
		
	   $this->view->toc=$toc;
       $this->view->render('mcq/toc');
        
      //echo json_encode($topiclist);
	}
	
	public function gettocsim(){
		
		require 'application/models/masters_model.php';
       $mastermodel = new Masters_model();
       $subject = $_POST['subject'];
       //$selected_employee_id = $_POST['employee_id'];
       $tocsim = $mastermodel->gettcsim($subject);
	  
	   $this->view->tocsim=$tocsim;
       $this->view->render('mcq/tocsim');
        
      //echo json_encode($topiclist);
	}
   
}
?>
