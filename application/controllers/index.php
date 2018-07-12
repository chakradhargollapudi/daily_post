<?php
class Index extends Basecontroller{

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
         $this->view->render('login');
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
              $userid=$user_details[0]['int_user_id'];
              $user_email = $user_details[0]['email'];
              $int_user_flag = $user_details[0]['int_user_flag'];
              $aud_videos_eyear = substr($int_user_flag, 0,1);
              $bec_videos_eyear = substr($int_user_flag, 1,1);
              $far_videos_eyear = substr($int_user_flag, 2,1);
              $reg_videos_eyear = substr($int_user_flag, 3,1);
            
              Session::init();
              Session::set('username',$username);
              Session::set('upass',$password);
              Session::set('user_email',$user_email);
              Session::set('userid',$userid);
              Session::set('txt_profile_image',$user_details[0]['txt_profile_image']);
              Session::set('int_student_status',$user_details[0]['int_student_status']);
              Session::set('txt_name',$user_details[0]['txt_name']);

              Session::set('aud_videos_eyear',$aud_videos_eyear);
              Session::set('bec_videos_eyear',$bec_videos_eyear);
              Session::set('far_videos_eyear',$far_videos_eyear);
              Session::set('reg_videos_eyear',$reg_videos_eyear);

              Session::set('phpgang','phpgang');

              $student_tablename = studenttablenames; //getting from config file
              $stustatus = $student_tablename[$user_details[0]['int_student_status']];
              Session::set('stustatus',$stustatus);
             Session::set('LoggedIn',true);
             header('location: '.URL.'dashboard/home');
         }else{
             $this->view->msg = "Username or password not matched ! Please try again.";
             $this->view->render('login');
         }
    }

    //logout function written by chakri
    public function logout(){
      error_reporting(E_ALL);
      ini_set("display_errors",1);
      $this->destroy();
      header('location: '.URL.'');
    }
    
  //code for support
  public function support(){
   require 'application/models/common_model.php'; //load required models , library
    $commonmodel = new Common_model(); //create objects for reference
     Session::init();

    // error_reporting(E_ALL);
    // ini_set("display_errors",1);
    //get email templates
    $email_templates = $commonmodel->getemail_templates();
    $this->view->email_templates = $email_templates;
    $this->view->render("dashboard/support");
  }

  public function gettemplatedetails(){
    require 'application/models/common_model.php'; //load required models , library
    $commonmodel = new Common_model(); //create objects for reference
    $topic_id = $_POST["topicid"];
    $email_templates = $commonmodel->getemail_templates($topic_id);
    echo $email_templates[0]["subject"]."#".$email_templates[0]["message"];
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

  public function unabletologin(){
    require 'application/models/common_model.php'; //load required models , library
    $commonmodel = new Common_model(); //create objects for reference
    $is_exists = array();
    $fromaddress = "no-reply@mileseducation.com";//"no-reply@mileseducation.com"; 
    $registered_email = $_POST["registered_email"];
    //check is registered email
    $is_exists = $commonmodel->getmasterdata("mileage_users",array("txt_registration_id"=>$registered_email));
    if(isset($is_exists) && count($is_exists)>0){
      $toaddress = $registered_email;
      $subject = "Login Credentials";
      $receipient_message = "Dear &nbsp;&nbsp;".$is_exists[0]['txt_name']." , <br><br>Below are your Login credentials. <br><br> LoginId : $registered_email <br> Password :". $is_exists[0]['password']."";
      $ccaddress = "support@mileseducation.com";//"chakradhar.gollapudi@wikischool.com";
      $mail_response = $this->sendemails($fromaddress,$toaddress,$registered_email,$receipient_message,$subject,$ccaddress); 
      echo "Login Credentials sent to your email Please check.";
    }else{
      $toaddress = "support@mileseducation.com";//"chakradhar.gollapudi@wikischool.com";
      $subject = "Unable to login $registered_email";
      $receipient_message = "Received Mail From $registered_email. <br> Requesting to provide login credentials.";
      $ccaddress = "";
      $mail_response = $this->sendemails($fromaddress,$toaddress,$registered_email,$receipient_message,$subject,$ccaddress);
      echo "Received your Request.Our support person will get back to you soon.";
    }
   
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
    public function searchquestion(){
      require 'application/models/reports_model.php'; //load required models , library
      $reports_model = new Reports_model(); //create objects for reference
      $searchvalue = $_POST["searchvalue"];
      $question_details = $reports_model->getquestiondetails($searchvalue);
      $this->view->searchvalue = $searchvalue;
      $this->view->question_details = $question_details;

      $this->view->render("include/layouts/globalsearch");
    }

    public function feedbackmail(){
       error_reporting(E_ALL);
      ini_set("display_errors",1);
      require 'application/models/common_model.php'; //load required models , library
      $commonmodel = new Common_model(); //create objects for reference
      $student_id = $_SESSION["userid"];
      $registered_email = $_POST["receipient_email"];
      $receipient_message = $_POST["receipient_message"];
      $subject = $_POST["subject"];
      $videos_rating = (isset($_POST["videos_rating"]))?$_POST["videos_rating"]:0;
      $mcq_rating = (isset($_POST["mcq_rating"]))?$_POST["mcq_rating"]:0;
      $sims_rating = (isset($_POST["sims_rating"]))?$_POST["sims_rating"]:0;
      $mocktest_rating = (isset($_POST["mocktest_rating"]))?$_POST["mocktest_rating"]:0;
      $reports_rating = (isset($_POST["reports_rating"]))?$_POST["reports_rating"]:0;
      $fromaddress = "no-reply@mileseducation.com";
      $toaddress = "chakradhar.gollapudi@wikischool.com";
      $ccaddress = "";
      $message = "";
      $message = "<table>
        <caption>Ratings</caption>
        <thead>
          <tr>
            <th>Category</th>
            <th>Rating</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Videos</td>
            <td>".$videos_rating."</td>
          </tr>
           <tr>
            <td>MCQ</td>
            <td>".$mcq_rating."</td>
          </tr>
           <tr>
            <td>SIM's</td>
            <td>".$sims_rating."</td>
          </tr>
           <tr>
            <td>Mocktest</td>
            <td>".$mocktest_rating."</td>
          </tr>
           <tr>
            <td>Reports</td>
            <td>".$reports_rating."</td>
          </tr>
        </tbody>
      </table>";
      $mail_subject = $subject.' from - '.$registered_email;
      $message .= "<br><br><br> ".$receipient_message;

      $insert_array = array("student_id"=>$student_id,
                            "videos_rating"=>$videos_rating,
                            "mcqs_rating"=>$mcq_rating,
                            "sims_rating"=>$sims_rating,
                            "mocktest_rating"=>$mocktest_rating,
                            "reports_rating"=>$reports_rating,
                            "message"=>$receipient_message,
                            "created_date"=>date("Y-m-d")
                            );
      $commonmodel->insertmasterdata("otbpanel_feedback",$insert_array);
      $mail_response = $this->sendemails($fromaddress,$toaddress,$registered_email,$message,$mail_subject,$ccaddress);
    }

}
?>
