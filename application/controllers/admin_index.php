<?php
class Admin_index extends Basecontroller{

     /**
     * summary
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index($parameter1 = false){
         // error_reporting(E_ALL);
         //    ini_set("display_errors",1);
         $this->view->render('adminpanel/login');
    }

   //function to check login written by chakri
    public function logincheck(){
      // error_reporting(E_ALL);
      // ini_set("display_errors",1);
       require 'application/models/common_model.php'; //load required models , library
       $commonmodel = new Common_model(); //create objects for reference
       $user_details = array();

       $username = isset($_POST['username'])?$_POST['username']:'';
       $password = isset($_POST['password'])?$_POST['password']:'';

       $user_details = $commonmodel->checklogin($username,$password);
      
       if(is_array($user_details) && count($user_details) >0){
            $login_id=$user_details[0]['login_id'];
            $full_name = $user_details[0]['full_name'];
            $role = $user_details[0]['role'];
            $user_name = $user_details[0]['user_name'];
            
            Session::init();
            Session::set('login_id',$login_id);
            Session::set('full_name',$full_name);
            Session::set('user_name',$user_name);
            Session::set('role',$role);
            header('location: '.URL.'admin_dashboard/home');
       }else{
           $this->view->msg = "Username or password not matched ! Please try again.";
           $this->view->render('adminpanel/login');
       }
    }

    //logout function written by chakri
    public function logout(){
      error_reporting(E_ALL);
      ini_set("display_errors",1);
      $this->destroy();
      header('location: '.URL.'admin_index');
    }
    
  //code to send the email
  public function sendsupportmail(){
    $mail_to = "";
    $fromaddress = "no-reply@mileseducation.com";//"no-reply@mileseducation.com"; 
    $receipient_email = $_POST["receipient_email"];
    $receipient_message = $_POST["receipient_message"];
    $subject = $_POST["subject"];
    $mail_to = (isset($_POST["mail_to"]))?$_POST["mail_to"]:"";

    if($mail_to =="acads"){
     $subject = $_POST["subject"].' --- '.$receipient_email;
     $toaddress = "chakradhar.gollapudi@wikischool.com";//jayashree.v@mileseducation.com
     $ccaddress = "pratibha.pradhan@wikischool.com";//"anish.venkata@mileseducation.com";
     $ccaddress .= ",mamatha.epili@wikischool.com";//"royston.dsouza@mileseducation.com";
    }else{
     $toaddress = "chakradhar.gollapudi@wikischool.com";
     $ccaddress = "";//"chakradhar.gollapudi@wikischool.com";
    }
    $mail_response = $this->sendemails($fromaddress,$toaddress,$receipient_email,$receipient_message,$subject,$ccaddress);
    echo $mail_response;
  }

  public function sendemails($fromaddress="",$toaddress="",$receipient_email="",$receipient_message="",$subject="",$ccaddress=""){
      $body = '
          <html>
          <head>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
          </head>
          <body>
          <p>'.$receipient_message.'</p>

          </body>
          </html>';
          require("application/controllers/PHPMailer-master/class.smtp.php");
          require("application/controllers/PHPMailer-master/class.phpmailer.php");
          $mail = new PHPMailer;
          $mail->SMTPDebug = 3;                               // Enable verbose debug output
          $mail->isSMTP();                                      // Set mailer to use SMTP
          $mail->Host = 'smtp.gmail.com;';  // Specify main and backup SMTP servers
          $mail->SMTPAuth = true;                               // Enable SMTP authentication
          $mail->Username = 'no-reply@mileseducation.com';                 // SMTP username
          $mail->Password = 'MILES2016';                 // SMTP password
          $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
          $mail->Port = 587;
          $mail->Subject = $subject;
          $mail->MsgHTML($body);
          $mail->IsSendmail();
          $mail->IsHTML(true);

          if($ccaddress !=""){
            $ccaddress_array = explode(",",$ccaddress);
            foreach($ccaddress_array as $ckey=>$cval){
              $mail ->AddCC($cval);
            }
          }
          if($fromaddress != ''){
            $mail->From = $fromaddress;
            $mail->FromName = "Miles";
            $mail->addAddress($toaddress);     // Add a recipient
            if(!$mail->Send()) {
                $emailMessage = 'Mail could not be sent Please try again.';
                $emailMessage .= 'Mailer Error: ' . $mail->ErrorInfo;
            } else {
                $emailMessage = 1;
            }
         }
         return  $emailMessage;
    }
}
?>
