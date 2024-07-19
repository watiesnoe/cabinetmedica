<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 17/03/2023
 * Time: 20:37
 */

class Securite_socials extends Controller
{
    public function index()
    {
       if($_SESSION['pseudo']){

           $sociale=new Securite_social();
            if(isset($_POST['submit'])){
              $sociale->InsrtionUdateData(['sociale','code','pourcentage']);
            }
           $this->view('ajouter_securite');

       }else{

           $this->redirect('login');
       }
    }

    public function liste()
    {
        if($_SESSION['pseudo']){

            $sociale=new Securite_social();

            $sociales=$sociale->SelectAllData("*",'securite_sociale');

            $this->view('securite',['sociales'=>$sociales]);

        }else{

            $this->redirect('login');
        }
    }

    public function edit($id)
    {
        if($_SESSION['pseudo']){

            $sociale=new Securite_social();

            if(isset($_POST['submit'])){
            
                $sociale->InsrtionUdateData(['sociale','code','pourcentage','idSecurite']);
            }
            $sociales=$sociale->select_data_table_join_where('SELECT * FROM securite_sociale WHERE idSecurite=:id',[':id'=>$id]);

            $this->view('ajouter_securite',['sociale'=>$sociales,'idSecurite'=>$id]);

        }else{

            $this->redirect('login');
        }
    }

}