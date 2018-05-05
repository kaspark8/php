<?php
  class DB {
    private static $instance = NULL;

    private function __construct() {}

    private function __clone() {}

    private static $settings = array(
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
      PDO::ATTR_EMULATE_PREPARES => false,
    );

    public static function getInstance() {
      if (!isset(self::$instance)) {
        self::$instance = new PDO('mysql:host=$host;dbname=$dbname', $user, $pass, self::$settings);
      }
      return self::$instance;
    }

    public static function queryOne($query, $params = array())
    {
      $result = self::$connection->prepare($query);
      $result->execute($params);
      return $result->fetch();
    }
  }
?>