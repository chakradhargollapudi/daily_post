<?php
class Common{
   	 /**
	 * summary
	 */
	public function __construct()
	{


       $browserurl = isset($_GET["url"])?rtrim($_GET["url"]):null;
	   $url= explode('/',$browserurl);

	   $file_path ='application/controllers/'.$url[0].'.php';
       if(empty($url[0])){
		require 'application/controllers/index.php';
		$indexcontroller = new Index();
		$indexcontroller->index();
		return false;
       }

	   if(file_exists($file_path)){
          require 'application/controllers/'.$url[0].'.php';
	   }else{
	   	require 'application/controllers/404.php';
        $errcontroller = new error();
        return false;
	   }

	   $basecontroller = new $url[0];

     if(empty($url[1])){ //echo"Dsadas";
       $basecontroller->index();
     }
	   if(isset($url[1]) && empty($url[3])){
	        $parameter1 =  (isset($url[2]))?$url[2]:'';
	        if(method_exists($basecontroller,$url[1])){
	             $basecontroller->{$url[1]}($parameter1);
	        }else{

	        }
	   }

        if(isset($url[1]) && isset($url[2]) && isset($url[3]) && isset($url[4]) && isset($url[5]) && isset($url[6])){
	        $parameter1 =  (isset($url[2]))?$url[2]:'';
                $parameter2 =  (isset($url[3]))?$url[3]:'';
                $parameter3 =  (isset($url[4]))?$url[4]:'';
                $parameter4 =  (isset($url[5]))?$url[5]:'';
                $parameter5 =  (isset($url[6]))?$url[6]:'';

	        if(method_exists($basecontroller,$url[1])){
	             $basecontroller->{$url[1]}($parameter1,$parameter2,$parameter3,$parameter4,$parameter5);
	        }else{

	        }
	   }

	   if(isset($url[1]) && isset($url[2]) && isset($url[3]) && empty($url[4])){
	        $parameter1 =  (isset($url[2]))?$url[2]:'';
                $parameter2 =  (isset($url[3]))?$url[3]:'';


	        if(method_exists($basecontroller,$url[1])){
	             $basecontroller->{$url[1]}($parameter1,$parameter2);
	        }else{

	        }
	   }

	   if(isset($url[1]) && isset($url[2]) && isset($url[3]) && isset($url[4]) && empty($url[5])){
	        $parameter1 =  (isset($url[2]))?$url[2]:'';
                $parameter2 =  (isset($url[3]))?$url[3]:'';
                $parameter3 =  (isset($url[4]))?$url[4]:'';


	        if(method_exists($basecontroller,$url[1])){
	             $basecontroller->{$url[1]}($parameter1,$parameter2,$parameter3);
	        }else{

	        }
	   }

	   if(isset($url[1]) && isset($url[2]) && isset($url[3]) && isset($url[4]) && isset($url[5])){
	        $parameter1 =  (isset($url[2]))?$url[2]:'';
                $parameter2 =  (isset($url[3]))?$url[3]:'';
                $parameter3 =  (isset($url[4]))?$url[4]:'';
                $parameter4 =  (isset($url[5]))?$url[5]:'';


	        if(method_exists($basecontroller,$url[1])){

	             $basecontroller->{$url[1]}($parameter1,$parameter2,$parameter3,$parameter4);
	        }else{

	        }
	   }


	}

}




/*
class Common{
   	 /**
	 * summary
	 */
	/*public function __construct()
	{


       $browserurl = isset($_GET["url"])?rtrim($_GET["url"]):null;
	   $url= explode('/',$browserurl);

	   $file_path ='application/controllers/'.$url[0].'.php';
       if(empty($url[0])){
		require 'application/controllers/index.php';
		$indexcontroller = new Index();
		$indexcontroller->index();
		return false;
       }

	   if(file_exists($file_path)){
          require 'application/controllers/'.$url[0].'.php';
	   }else{
	   	require 'application/controllers/404.php';
        $errcontroller = new error();
        return false;
	   }

	   $basecontroller = new $url[0];

	   if(isset($url[1]) && empty($url[2])){
	        $parameter1 =  (isset($url[2]))?$url[2]:'';

//	        if(method_exists($basecontroller,$url[1])){
//	             $basecontroller->{$url[1]}($parameter1);
//	        }else{

	        //}

                $parameter2 =  (isset($url[3]))?$url[3]:'';

                 $parameter3 =  (isset($url[4]))?$url[4]:'';

                if(method_exists($basecontroller,$url[1])){
	             $basecontroller->{$url[1]}($parameter1);
                     // $basecontroller->{$url[1]}($parameter1,$parameter2);
                     // $basecontroller->{$url[1]}($parameter1,$parameter2,$parameter3);

	        }

//                if(method_exists($basecontroller,$url[1])){
//	             $basecontroller->{$url[1]}($parameter1,$parameter2);
//	        }
//


//                if(method_exists($basecontroller,$url[1])){
//                    $basecontroller->{$url[1]}($parameter1,$parameter2,$parameter3);
//                } else{
//
//                }


	   }

            if(isset($url[2])){

                $parameter1 =  (isset($url[2]))?$url[2]:'';

//	        if(method_exists($basecontroller,$url[1])){
//	             $basecontroller->{$url[1]}($parameter1);
//	        }else{

	        //}

                $parameter2 =  (isset($url[3]))?$url[3]:'';

                 $parameter3 =  (isset($url[4]))?$url[4]:'';
                  $basecontroller->{$url[1]}($parameter1,$parameter2,$parameter3);
            }

	}

}*/

?>
