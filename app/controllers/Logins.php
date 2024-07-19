<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 21/11/2022
 * Time: 13:31
 */

class Logins extends Controller
{
    public function index()

    {

        $login= new Login();

        if(isset($_POST['submit'])){

           $login->verificationLogin(['pseudo','password']);

        }

        $this->view('login');
    }


}