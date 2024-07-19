<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 21/11/2022
 * Time: 13:25
 */
class Home extends Controller{

    public function index(){

        if (isset($_SESSION['pseudo'])) {
                $this->view('home');
        }else{

            $this->redirect('login');
        }

    }
}