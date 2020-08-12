<?php
require 'Model/UserModel.php';
require 'Model/User.php';
require_once 'config.php';

session_status() === PHP_SESSION_ACTIVE ? TRUE : session_start();

class LoginController
{

    function __construct()
    {
        $this->config = new config();
        $this->model =  new UserModel($this->config);
    }
    // mvc handler request

    public function mvcHandler()
    {
        $action = isset($_GET['action']) ? $_GET['action'] : NULL;
        switch ($action) {
            case 'register':
                $this->insert();
                break;
            case 'login':
                $this->checkLogin();
                break;
            case 'logout':
                $this->logout();
                break;
            case 'home':
                $this->home();
                break;
            case 'signup':
                $this->list('signup');
                break;
            default:
                $this->list();
        }
    }


    // add new record
    public function insert()
    {
        unset($_SESSION['log_error_msg']);
        unset($_SESSION['reg_error_msg']);

        try {
            $register = new User();
            if (isset($_POST['signup'])) {

                if (trim($_POST['password']) !== trim($_POST['password_confirm'])) {

                    $_SESSION['reg_error_msg'] = 'Password and Confirm Password Missmatch'; //add session obj           
                    $this->list('toregister');
                } else {

                    // read form value
                    $register->email = trim($_POST['email']);
                    $register->first_name = trim($_POST['first_name']);
                    $register->last_name = trim($_POST['last_name']);
                    $register->password = trim($_POST['password']);
                    $register->date_of_birth = trim($_POST['date_of_birth']);
                    //call validation

                    $chk = true;
                    if ($chk) {
                        //call insert record            
                        $pid = $this->model->insertRecord($register);
                        if ($pid > 0) {
                            $this->list();
                        } else {
                            echo "Somthing is wrong..., try again.";
                        }
                    } else {
                        echo 'true';
                        $_SESSION['user_data'] = json_encode($register); //add session obj           
                        $this->pageRedirect("View/home.php");
                    }
                }
            }
        } catch (Exception $e) {
            $this->objsm->close_db();
            throw $e;
        }
    }

    public function checkLogin()
    {
        unset($_SESSION['log_error_msg']);
        unset($_SESSION['reg_error_msg']);

        if (isset($_POST['login'])) {
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $result = $this->model->getRecord($email, $password);
            $row = mysqli_fetch_array($result);
            if ($row) {
                $user = new User();
                $user->id = $row["id"];
                $user->first_name = $row["first_name"];
                $user->last_name = $row["last_name"];
                $user->email = $row["email"];
                $user->date_of_birth = $row["date_of_birth"];
                $_SESSION['user_data'] = serialize($user);
                // $this->pageRedirect("View/home.php");
                $this->home();
            } else {
                $_SESSION['log_error_msg'] = 'Username or Password Missmatch'; //add session obj           
                $this->list();
            }
        }
    }

    public function pageRedirect($url)
    {
        header('Location:' . $url);
    }

    public function list($url = null)
    {
        if (empty($url)) {

            include "View/login.php";
        } else {

            include "View/signup.php";
        }
    }

    public function home()
    {
        include "View/home.php";
    }

    public function logout()
    {
        session_unset();
        header('Location:index.php');
    }
}
