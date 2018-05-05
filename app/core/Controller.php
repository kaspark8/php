<?php

class Controller
{
    public $db = null;

    public $model = null;

    function __construct()
    {
        $this->openDatabaseConnection();
        $this->loadModel($model=NULL);
    }

    private function openDatabaseConnection()
    {
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
    }

    public function loadModel($model)
    {
        $path = 'models/'.$model.'.php';
        if (file_exists(APP . 'model/' . $model . '.php')) {
            require APP . 'model/'.$model.'.php';
            $this->model = new $model($this->db);
        }
    }
}
