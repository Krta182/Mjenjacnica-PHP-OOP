<?php

require("core.functions.php");

class AppCore
{

  protected static $dbObj = null;

  public function __construct()
  {

    $this->initDB();
    require_once("util/RequestHandler.class.php");
    RequestHandler::handle();
  }

  //get message from exception folder
  public function handleException(Exception $e)
  {
     $e->show();
  }

  //approaching database
  public function initDB()
  {

    $dbHost = $dbUser = $dbPassword = $dbName = '';

    require_once('config.inc.php');

    // database connect
    require_once("model/MySQLiDatabase.class.php");
    self::$dbObj = new MySQLiDatabase($dbHost, $dbUser, $dbPassword, $dbName);
  }

  //get database 
  final public static function getDB()
  {
    return self::$dbObj;
  }


  public static function autoload($classname){
    if(file_exists('system/control'.$classname))
    {

    }
  }

}


?>