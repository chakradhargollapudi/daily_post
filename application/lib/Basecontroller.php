<?php
/**
 * summary
 */
class Basecontroller
{
	public function __construct() {
		$this->view = new Baseview();
	}

	public function loadmodel($modelname) {
		$modelpath = 'models/'.$modelname.'_model.php';
		if (file_exists($modelpath)) {
			require $modelpath;
			$modelname   = $modelname.'_model.php';
			$this->model = new $modelname();
		}
	}
	public static function destroy(){
		@session_start();
    	unset($_SESSION);
        session_destroy();
    }
    public function revertassignedcalls($wheredata = array()){
       $commonmodel = new Common_model();
       $callscount = $commonmodel->checkcallscount($wheredata['employee_id'],$wheredata['city_id']);
//print_r($callscount[0]['callcount']);exit;
       if($callscount[0]['callcount'] >0){ //revert the calls
 			$where_condition = array('employee_id'=>$wheredata['employee_id'],'last_called_by'=>0);
            $set_condition = array('owner_id'=>'');
			return $callsrevertedcount = $commonmodel->revertcalls($wheredata['employee_id'],$wheredata['city_id']);
	   }
	}



}
?>
