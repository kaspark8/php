<?php

class Pages extends Controller
{
    function __construct(){
        parent::__construct();
        $this->loadModel('PagesModel');
      }
    public function index()
    {
        $pages = $this->model->getAllPages();

        require APP . 'view/_templates/header.php';
        require APP . 'view/pages/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function view($page_id)
    {
        if (isset($page_id)) {

            $page = $this->model->getPage($page_id);

            if (!$page) {
                header('location: ' . URL . 'pages');
            }

            require APP . 'view/_templates/header.php';
            require APP . 'view/pages/view.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL . 'pages');
        }
    }

    public function add()
    {
        if(isset($_SESSION['user_type']) && in_array($_SESSION['user_type'], MODPAGES)) {
            require APP . 'view/_templates/header.php';
            require APP . 'view/pages/add.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL . 'pages');
        }
    }

    public function addPage()
    {
        if (isset($_POST["add_page"]) && isset($_SESSION['user_type']) && in_array($_SESSION['user_type'], MODPAGES)) {
            $this->model->addPage($_POST["page_name"], $_POST["page_content"]);
        }

        header('location: ' . URL . 'pages');
    }

    public function edit($page_id)
    {
        if (isset($page_id) && isset($_SESSION['user_type']) && in_array($_SESSION['user_type'], MODPAGES)) {

            $page = $this->model->getPage($page_id);

            if (!$page) {
                header('location: ' . URL . 'pages');
            }

            require APP . 'view/_templates/header.php';
            require APP . 'view/pages/edit.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL . 'pages');
        }
    }

    public function delete($page_id)
    {
        if (isset($page_id) && isset($_SESSION['user_type']) && in_array($_SESSION['user_type'], MODPAGES)) {
            $this->model->deletePage($page_id);
        }
        
        header('location: ' . URL . 'pages');
    }

    public function updatePage()
    {
        if (isset($_POST["update_page"]) && isset($_SESSION['user_type']) && in_array($_SESSION['user_type'], MODPAGES)) {
            $this->model->updatePage($_POST["page_id"], $_POST["page_name"],  $_POST["page_content"]);
        }
        header('location: ' . URL . 'pages/view/' . $_POST["page_id"]);
    }

}
