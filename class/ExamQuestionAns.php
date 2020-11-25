<?php
$filepath = realpath(dirname(__DIR__));
include_once ($filepath.'../lib/Database.php');
include_once ($filepath.'../lib/Session.php');
include_once ($filepath.'../helpers/Format.php');

class ExamQuestionAns{

    public $db;
    public $fm;
    public $tablename = "table_questions";
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    // public function Registration($data){
    //     $name = $this->fm->validation($data['name']);
    //     $username = $this->fm->validation($data['username']);
    //     $password = $this->fm->validation(md5($data['password']));
    //     $email = $this->fm->validation($data['email']);
    //     $checkEmail = $this->fm->validation($this->checkEmail($email));
    //     if($name == '' || $username == '' || $password == '' || $email == ''){
    //         return "<div class='alert alert-danger'>Empty Field</div>";
    //     }else if($checkEmail == true){
    //         return "<div class='alert alert-danger'>email is already exist</div>";
    //     }else {
    //         $sql = "INSERT INTO $this->tablename(student_name,student_username,students_password,students_email)values('$name','$username','$password','$email')";
    //         $insert = $this->db->insert($sql);
    //         if($insert){
    //             return '<div class="alert alert-success" role="alert">
    //                             <strong>Success!</strong>Registeration Successful
    //                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //                             <span aria-hidden="true">&times;</span>
    //                             </button>
    //                         </div>';
    //         }else{
    //              return '<div class="alert alert-danger" role="alert">
    //                             <strong>Problem!</strong>Registration Unseccess
    //                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    //                             <span aria-hidden="true">&times;</span>
    //                             </button>
    //                         </div>';
    //         }
    //     }
        
    // }

    public function InsertQuestionAns($data){
        $question_number = $this->Validation($data['question_number']);
        $question = $this->Validation($data['question']);
        $ans = array();
        $ans[1] = $this->Validation($data['ans1']);
        $ans[2] = $this->Validation($data['ans2']);
        $ans[3] = $this->Validation($data['ans3']);
        $ans[4] = $this->Validation($data['ans4']);
        $currect_No = $this->Validation($data['currect_No']);

        $insert =  "INSERT INTO $this->tablename (question_no,question_name)values('$question_number','$question')";
        $insertQue = $this->db->insert( $insert);
        if($insertQue){
            foreach($ans as $k=>$ansName){
                if($ansName !== ''){
                    if($currect_No == $k){
                        $qr =  "INSERT INTO  table_answer (question_no,right_answer,option_answer)values('$question_number','1','$ansName')";
                    }else{
                        $qr =  "INSERT INTO  table_answer (question_no,right_answer,option_answer)values('$question_number','0','$ansName')";
                    }
                    $insertAns = $this->db->insert($qr);
                    if($insertAns){
                        continue;
                    }else{
                        echo "sorry problem";
                    }
                }
            }
            return '<div class="alert alert-success" role="alert">
                        <strong>Success!</strong> Question and Ans Added Successfully
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>';
                    
        }

        
    }

    public function ExamquestionRows(){//count total rows in table_questions
        $query = "SELECT * FROM  $this->tablename" ;
        $getResult = $this->db->select($query);
        $totalRow = $getResult->num_rows;
        return $totalRow;
    }

    public function ShowQuestions(){
         error_reporting(0);
        $sql = "SELECT * FROM $this->tablename  ";
        $show = $this->db->select($sql);
        if ($show == true) {
            return $show;
        } else {
            return false;
        }
    }

    public function DeleteQuestions($id){
        $sql = "DELETE FROM $this->tablename where 	question_id='$id'";
        $delete = $this->db->delete($sql);
        if ($delete) {
          return "<div class='alert alert-danger'>Question delete successful</div>";
        }
    }

    public function Validation($data)
    { //validation
        $data = trim($data);
        $data = htmlentities($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = mysqli_real_escape_string($this->db->link, $data);
        return $data;
    }

    





}


?>