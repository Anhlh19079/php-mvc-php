<?php
class DBConnection {
    private static $instance = NULL;
    public static function getInstance() {
      if (!isset(self::$instance)) {
        try {
          $dbc='mysql:host=localhost;dbname=hazomishop';
          $name ='root';
          $pass ='';
          self::$instance = new PDO($dbc, $name, $pass);
          self::$instance->exec("SET NAMES 'utf8'");
        } catch (PDOException $e) {
          die($e->getMessage());
        }
      }
      return self::$instance;
    }
}
?>