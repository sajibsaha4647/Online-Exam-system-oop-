<?php
$filepath = realpath(dirname(__DIR__));
include_once ($filepath.'../lib/Database.php');
include_once ($filepath.'../lib/Session.php');
include_once ($filepath.'../helpers/Format.php');

class Frontlogin{

    public $db;
    public $fm;
    public $tablename = "student_user";
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function LoginFront($data){
         $username = $this->fm->validation($data['username']);
         $password = $this->fm->validation(md5($data['password']));
          if($username == '' ||  $password == ''){
                return '<div class="alert alert-danger" role="alert">
                                <strong>Problem!</strong> empty field
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
            }else{
                $qery = "SELECT * FROM $this->tablename WHERE student_username='$username' AND students_password='$password'";
                    $showcheck = $this->db->select($qery);
                    
                if($showcheck == true){
                        $value = $showcheck->fetch_assoc();
                        Session::init();
                        Session::set('adminlogin',true);
                        Session::set('frontname',$value['student_name']);
                        Session::set('frontuser',$value['student_username']);
                        Session::set('frontpass',$value['students_password']);
                        Session::set('frontemail',$value['students_email']);
                        Session::set('students_id',$value['students_id']);
                        header('location:exam.php');
                    }else{
                        
                    return '<div class="alert alert-danger" role="alert">
                                <strong>Problem!</strong> username or password did not mathch
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
                    }
            }

    } 

    public function Registration($data){
        $name = $this->fm->validation($data['name']);
        $username = $this->fm->validation($data['username']);
        $password = $this->fm->validation(md5($data['password']));
        $email = $this->fm->validation($data['email']);
        $checkEmail = $this->fm->validation($this->checkEmail($email));
        if($name == '' || $username == '' || $password == '' || $email == ''){
            echo "<div class='alert alert-danger'>Empty Field</div>";
            exit;
        }else if($checkEmail == true){
            return "<div class='alert alert-danger'>email is already exist</div>";
        }else if(filter_var($email , FILTER_VALIDATE_EMAIL) == false){
                echo "<div class='alert alert-danger'>Invalid email</div>";
            exit;
        }else {
            $sql = "INSERT INTO $this->tablename(student_name,student_username,students_password,students_email)values('$name','$username','$password','$email')";
            $insert = $this->db->insert($sql);
            if($insert){
                echo '<div class="alert alert-success" role="alert">
                                <strong>Success!</strong>Registeration Successful
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
                            exit();
            }else{
                 echo '<div class="alert alert-danger" role="alert">
                                <strong>Problem!</strong>Registration Unseccess
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
                            exit();
            }
        }
        
    }

    public function UpdateProfile($data){
         $name = $this->fm->validation($data['name']);
        $username = $this->fm->validation($data['username']);
        if($name == '' || $username == ''){
            echo "<div class='alert alert-danger'>Empty Field</div>";
            exit;
        }else {
            $sql = "INSERT INTO $this->tablename(student_name,student_username)values('$name','$username')";
            $insert = $this->db->insert($sql);
            if($insert){
                echo '<div class="alert alert-success" role="alert">
                                <strong>Success!</strong>Updated Successful
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
                            exit();
            }else{
                 echo '<div class="alert alert-danger" role="alert">
                                <strong>Problem!</strong>Update Unseccess
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
                            exit();
            }
        }
    }

    public function showalluser(){
         error_reporting(0);
        $sql = "SELECT * FROM $this->tablename ";
        $show = $this->db->select($sql);
        if ($show == true) {
            return $show;
        } else {
            return false;
        }
    }

    public function DeleteUser($id){
        $sql = "DELETE FROM $this->tablename where students_id='$id'";
        $delete = $this->db->delete($sql);
        if ($delete) {
          return "<div class='alert alert-danger'>user delete successful</div>";
        }
    }


     public function checkEmail($email)
    {
        $sql = "SELECT * FROM $this->tablename WHERE 	students_email='$email'";
        $check = $this->db->select($sql);
        if ($check !== false) {
            $row = mysqli_num_rows($check);
            if ($row > 0) {
                return  true;
            } else {
                return false;
            }
        }
    }





}


?>