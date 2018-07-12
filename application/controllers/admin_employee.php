<?php
class Admin_employee extends Basecontroller{

     /**
     * summary
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function create_employee($parameter1 = false){
         error_reporting(E_ALL);
            ini_set("display_errors",1);
         $this->view->render('adminpanel/employee/create_employee');
    }

    public function employee_list($parameter1 = false){

         $this->view->render('adminpanel/employee/create_employee');
    }
}
?>
