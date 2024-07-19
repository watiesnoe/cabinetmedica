<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 21/11/2022
 * Time: 13:27
 */

class Controller
{
    public function e($value){

        if ($value){
            $value=htmlspecialchars($value);
            $value=htmlentities($value);
            $value=strip_tags($value);
            return $value;
        }
    }

    public function load_model($model)
    {
        // code...
        if(file_exists('app/models/'.ucfirst($model).'.php')){
            require_once('app/models/'.ucfirst($model).'.php');
            return new $model();
        }
        return false;
    }

    function view($view,$data=[]){

        if (file_exists('app/views/'.$view.'.view.php')) {
            extract($data);
            require_once('app/views/'.$view.'.view.php');
        }else {
            require_once('app/views/404.view.php');
        }
    }

    public  function redirect($page)
    {
        header("Location:".ROOT."/".trim($page,"/"));
        exit();
    }
}