<?php
class App
{
    protected $data = array();
    public function isLogged(){
        if(isset($_SESSION['username'])) return true;
        return false;
    }
    
    public function view($name,$args = array()){
        extract($args);
        include('view/'.$name.'.php');
    }
}
