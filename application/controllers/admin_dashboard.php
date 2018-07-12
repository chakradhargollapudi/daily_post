<?php
class Admin_dashboard extends Basecontroller{

     /**
     * summary
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function home($parameter1 = false){
         // error_reporting(E_ALL);
         //    ini_set("display_errors",1);
         $this->view->render('adminpanel/dashboard');
    }
}
?>
