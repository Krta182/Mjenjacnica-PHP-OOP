<?php
//extending methods from exception 

class DataBaseException extends \Exception{
    public function show(){
        //get auto functions from exception
        $this->getMessage();
        $this->getFile();
        $this->getLine();
        $this->getTraceAsString();

    }
}
?>