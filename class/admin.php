<?php
 $filepath = realpath(dirname(__DIR__));
include_once ($filepath.'../lib/Database.php');
include_once ($filepath.'../lib/Session.php');
include_once ($filepath.'../helpers/Format.php');

class Admin{

    public $db;
    public $fm;
    public $tablename = "exam_users";
    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function getadmindata($data){
        $username = $this->fm->validation($data['username']);
        $password = $this->fm->validation(md5($data['password']));
        $usernam = mysqli_real_escape_string($this->db->link,$username);
        $pass = mysqli_real_escape_string($this->db->link,$password);
            if($pass == '' ||  $usernam == ''){
                return '<div class="alert alert-danger" role="alert">
                                <strong>Problem!</strong> empty field
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>';
            }else{
                $qery = "SELECT * FROM $this->tablename WHERE user_name='$usernam' AND user_password='$pass'";
                    $showcheck = $this->db->select($qery);
                    
                if($showcheck == true){
                        $value = $showcheck->fetch_assoc();
                        Session::init();
                        Session::set('adminlogin',true);
                        Session::set('adminuser',$value['user_name']);
                        Session::set('adminpassword',$value['user_password']);
                        Session::set('adminid',$value['user_id']);
                        header('location:index.php');
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

}

?>