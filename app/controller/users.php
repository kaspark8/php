<?php

class Users extends Controller
{
    function __construct(){
        parent::__construct();
        $this->loadModel('UsersModel');
      }
    public function index()
    {
        $users = $this->model->getAllUsers();

        require APP . 'view/_templates/header.php';
        require APP . 'view/users/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function profile()
    {
        if (isset($_SESSION['user_id'])) {

            $user = $this->model->getUser($_SESSION['user_id']);

            if (!$user) {
                header('location: ' . URL . 'users/login');
            }

            require APP . 'view/_templates/header.php';
            require APP . 'view/users/profile.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL . 'users/login');
        }
    }

    public function add()
    {
        if (!isset($_SESSION['user_id'])) {
            require APP . 'view/_templates/header.php';
            require APP . 'view/users/add.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL . 'users');
        }
    }

    public function logOut()
    {

        if (isset($_SESSION["user_id"])) {
            session_destroy();
            header('location: ' . URL . '');
        } else {
            header('location: ' . URL . 'users/login');
        }
    }

    public function login()
    {
        if (isset($_POST["logmein"])) {
            $user = $this->model->getLoginUser($_POST["user_name"]);

            if($user->user_name == $_POST["user_name"] && $user->user_pass == $_POST["user_pass"]) {
                $_SESSION["user_id"] = $user->user_id;
                $_SESSION["user_name"] = $user->user_name;
                $_SESSION["user_type"] = $user->user_type;
                header('location: ' . URL . 'users');
            } else {
                header('location: ' . URL . 'users/login/?error');
            }
        }

        require APP . 'view/_templates/header.php';
        require APP . 'view/users/login.php';
        require APP . 'view/_templates/footer.php';
    }

    public function addUser()
    {
        if (isset($_POST["add_user"])) {
            $this->model->addUser($_POST["user_name"], $_POST["user_email"], $_POST["user_pass"]);
        }

        header('location: ' . URL . 'users');
    }

    public function edit($user_id)
    {
        if (isset($user_id) && isset($_SESSION['user_type']) && in_array($_SESSION['user_type'], MODUSERS)) {

            $user = $this->model->getUser($user_id);

            if (!$user) {
                header('location: ' . URL . 'users');
            }

            require APP . 'view/_templates/header.php';
            require APP . 'view/users/edit.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL . 'users');
        }
    }

    public function delete($user_id)
    {
        if (isset($user_id) && isset($_SESSION['user_type']) && in_array($_SESSION['user_type'], MODUSERS)) {
            $this->model->deleteUser($user_id);
        }
        
        header('location: ' . URL . 'users');
    }


    public function updateUser()
    {
        if (isset($_POST["update_user"])) {
            $this->model->updateUser($_POST["user_id"], $_POST["user_name"],  $_POST["user_email"],  $_POST["user_type"]);
        }
        header('location: ' . URL . 'users/edit/' . $_POST["user_id"]);
    }

    public function updateProfile()
    {
        if (isset($_POST["update_profile"])) {
            $this->model->updateProfile($_POST["user_id"], $_POST["user_name"],  $_POST["user_pass"],  $_POST["user_email"]);
        }
        header('location: ' . URL . 'users/profile');
    }

}
