<?php
//include system exception
require_once("system/exception/SystemException.class.php");
class RequestHandler{
    
    public function __construct($className)
    {
        $classname=$className."Page";
        $classPath=('system/control/' . $classname. ".class.php");
       
        //include class
        require_once($classPath);

        //execute class
        if(!class_exists($classname))
        {
            throw new SystemException("Class '".$classname."' not found");
        }
        new $className();
        
    }
    
    //Handle http request
    public static function handle(){
        if(!empty($_GET['page'])|| !empty($_POST['page'])){
            new RequestHandler((!empty($_GET['page']) ? $_GET['page'] : $_POST['page']));
        }
        else{
            new RequestHandler('index');
        }
    }
}
?>