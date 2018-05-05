<?php

class Products extends Controller
{
    function __construct(){
        parent::__construct();
        $this->loadModel('ProductsModel');
      }
    public function index()
    {
        $products = $this->model->getAllProducts();
        $users = $this->model->getAllUsers();
        $owner = array();

        if(!empty($users)) {
            foreach ($users as $user) {
                $owner[$user->user_id] = $user->user_name;
            }
        }

        require APP . 'view/_templates/header.php';
        require APP . 'view/products/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function add()
    {
        if(isset($_SESSION['user_type']) && in_array($_SESSION['user_type'], MODPRODUCTS)) {

            $users = $this->model->getAllUsers();

            require APP . 'view/_templates/header.php';
            require APP . 'view/products/add.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL . 'products');
        }
    }

    public function addProduct()
    {
        if (isset($_POST["add_product"]) && isset($_SESSION['user_type']) && in_array($_SESSION['user_type'], MODPRODUCTS)) {
            $this->model->addProduct($_POST["product_name"], $_POST["product_price"], $_POST["product_owner_id"]);
        }

        header('location: ' . URL . 'products');
    }

    public function edit($product_id)
    {
        if (isset($product_id) && isset($_SESSION['user_type']) && in_array($_SESSION['user_type'], MODPRODUCTS)) {

            $product = $this->model->getProduct($product_id);

            $users = $this->model->getAllUsers();

            if (!$product) {
                header('location: ' . URL . 'products');
            }

            require APP . 'view/_templates/header.php';
            require APP . 'view/products/edit.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL . 'products');
        }
    }

    public function delete($product_id)
    {
        if (isset($product_id) && isset($_SESSION['user_type']) && in_array($_SESSION['user_type'], MODPRODUCTS)) {
            $this->model->deleteProduct($product_id);
        }
        
        header('location: ' . URL . 'products');
    }

    public function updateProduct()
    {
        if (isset($_POST["update_product"]) && isset($_SESSION['user_type']) && in_array($_SESSION['user_type'], MODPRODUCTS)) {
            $this->model->updateProduct($_POST["product_id"], $_POST["product_name"], $_POST["product_price"], $_POST["product_owner_id"]);
        }
        header('location: ' . URL . 'products');
    }

}
