<?php
 class Common_model extends Basemodel{

    public function __counstruct(){
         parent::__counstruct();
    }
    public function checklogin($username = '',$password = ''){
        $query = $this->db->prepare("select login_id,full_name,role,int_status from tbl_login where user_name= '$username' and password = '$password' ");
        $query->execute();
        $rowscount = $query->rowcount();
        if($rowscount >0){
         return $data = $query->fetchAll(PDO::FETCH_ASSOC);
        }else{
         return array();
        }
    }
    // function getcorrectcount_new_mcqs($stustatus,$student_id,$subject_id="",$topic_id="",$subtopicid="")
    // {
    //   $sess = "";
    //   $sql="SELECT txt_session_id FROM ".$stustatus." WHERE int_student_id=".$student_id." ORDER BY int_id DESC LIMIT 0,1";
    //   $stmt = $this->db->prepare($sql);
    //   $stmt->execute();
    // // echo $stmt->queryString;
    //   $rowscount = $stmt->rowcount();
    //   if($rowscount >0){
    //     $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     $sess= $data[0]["txt_session_id"];
    //   }

    //   $where = "";
    //     if($subject_id !=""){
    //        $where .=" and c.int_subject_id=$subject_id"; 
    //     }

    //     if($topic_id !=""){
    //        $where .=" and c.int_maintopic_id=$topic_id"; 
    //     }

    //      if($subtopicid !=""){
    //        $where .=" and c.txt_subtopic_id='".$subtopicid."'"; 
    //     }


    // $sql="SELECT 
    //     SUM(case when subjectid=101 then lco else 0 end) as audcorrect,
    //     SUM(case when subjectid=102 then lco else 0 end) as beccorrect,
    //     SUM(case when subjectid=103 then lco else 0 end) as farcorrect,
    //     SUM(case when subjectid=104 then lco else 0 end) as regcorrect
    //     FROM(SELECT c.int_subject_id as subjectid,IF(a.txt_latest_attempt_opt=c.txt_correct_option,1,0) AS lco FROM otb_questions c LEFT JOIN ".$_SESSION['stustatus']." a ON c.`txt_question_id`=a.`txt_question_id` WHERE a.txt_question_id NOT IN(SELECT txt_question_id FROM ".$stustatus." WHERE txt_session_id='".$sess."') AND a.txt_latest_attempt_opt=(SELECT b.txt_latest_attempt_opt FROM ".$stustatus." b WHERE b.txt_question_id=a.txt_question_id AND b.int_student_id=".$student_id." ORDER BY b.int_id DESC LIMIT 0,1) AND a.int_student_id=".$student_id." $where GROUP BY a.txt_latest_attempt_opt,a.txt_question_id,c.`txt_correct_option`) AS table1";
    //   $stmt = $this->db->prepare($sql);
    //   $stmt->execute();
    //  // echo $stmt->queryString;exit;
    //   $rowscount = $stmt->rowcount();
    //    if($rowscount >0){
    //        return $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //    }else{
    //       return array();
    //    }
    // }
 }
?>
