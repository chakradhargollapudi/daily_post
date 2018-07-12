<?php
   class Baseview
   {
         /**
	     * summary
	     */
	    public function __construct()
	    {

	    }
	    public function render($name){ 
           require 'application/views/'.$name.'.php';
	    }
   }
?>