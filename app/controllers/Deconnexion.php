<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 17/03/2023
 * Time: 14:40
 */

class Deconnexion extends Controller
{

    public function index(){
            session_destroy();
           $this->redirect('login');
    }


}