<?php
class Error extends Basecontroller{

      public function __construct(){
    	parent::__construct();
        echo "This Page is not available or not able access in current browser,Check in Google chrome."
    	// $this->view->msg = "This page is not available!";
     //    $this->view->render('error');
      }



}


?>
