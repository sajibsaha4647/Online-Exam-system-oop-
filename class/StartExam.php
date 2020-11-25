<?php
$filepath = realpath(dirname(__DIR__));
include_once ($filepath.'../lib/Database.php');
include_once ($filepath.'../lib/Session.php');
include_once ($filepath.'../helpers/Format.php');

class StartExam {
    public $db;
    public $fm;
    public $tablename = "table_questions";
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function ExamquestionRows(){//count total rows in table_questions
        $query = "SELECT * FROM  $this->tablename" ;
        $getResult = $this->db->select($query);
        $totalRow = $getResult->num_rows;
        return $totalRow;
    }

    public function GetQuestion(){
        $query = "SELECT * FROM  $this->tablename" ;
        $getResult = $this->db->select($query);
        $Maindata =  $getResult->fetch_assoc();
        return  $Maindata ;

    }

    
    public function QuestionByNumber($number){
        $query = "SELECT * FROM  $this->tablename where  question_no = '$number'" ;
        $getResult = $this->db->select($query);
        $Maindata =  $getResult->fetch_assoc();
        return  $Maindata ;
    }

    //question list
    public function QuestionByOrder(){
        $query = "SELECT * FROM  $this->tablename ORDER BY question_no ASC" ;
        $getResult = $this->db->select($query);
        return  $getResult ;
    }

    public function GetAnswer($number){
        $query = "SELECT * FROM  table_answer where question_no = '$number'" ;
        $getResult = $this->db->select($query);
        return  $getResult ;
    }




    public function GetProcessAnswer($data){
        $SelectedAns    = $this->Validation($data['ans']);
        $SelectedNumber = $this->Validation($data['number']);
        $next           = $SelectedNumber+1;

        if(!isset($_SESSION['score'])){
            $_SESSION['score'] = '0';
        }

        $total = $this->ExamquestionRows();
        $right = $this->RightAns($SelectedNumber);
        if($right == $SelectedAns){
             $_SESSION['score']++;
        }
        if($SelectedNumber == $total){
            header('location:FinalResult.php');
            exit();
        }else{
            header('location:test.php?Q='.$next  );
        }



    }

    public function RightAns($number){
        $query = "SELECT * FROM  table_answer WHERE question_no='$number' AND right_answer='1'" ;
        $getResult = $this->db->select($query);
        $Maindata =  $getResult->fetch_assoc();
        $Result  =  $Maindata['answer_id'];
        return  $Result;
        // var_dump($Maindata );
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