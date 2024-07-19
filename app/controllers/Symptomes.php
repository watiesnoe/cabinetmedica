<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 15/03/2023
 * Time: 14:53
 */

class Symptomes extends Controller
{
    public function index(){
        if (isset($_SESSION['pseudo'])){

            $maladie=new Maladie();

            $symptome=new Symptome();

            if (isset($_POST['submit'])){

                $symptome->insertionUpdate_function(['nomMaladie','symptome']);
            }

            $data=$maladie->SelectAllData('*','maladie');

            $select=$this->dataselect($data);

            $this->view('ajouter_symptome',['row'=>$select]);

        }else{
            $this->redirect('login');
        }
    }
    public function dataselect($data){
        $output="";
        foreach($data as $row)
        {
            $output .= '<option value="'.$row->num_maladie.'">'.$row->nom_maladie.'</option>';
        }
        return $output;
    }
    public function edit($id){
        if (isset($_SESSION['pseudo'])){

            $symptome=new Symptome();
            if (isset($_POST['submit'])){
                $symptome->insertionUpdate_function(['idSyptome','symptome']);
            }

            $symptomes=$symptome->FetchSelectWhere('*','symptome','num_syptome=:idSyptome',[":idSyptome"=>$id]);

            $this->view('ajouter_symptome',['id'=>$id,"symptomes"=>$symptomes]);
        }else{
            $this->redirect('login');
        }
    }

    public function liste(){
        if (isset($_SESSION['pseudo'])){

            $symptome=new Symptome();

            $symptomes=$symptome->SelectAllData('*','symptome join maladie ON symptome.num_maladie=maladie.num_maladie');


            $this->view('symptome',["symptomes"=>$symptomes]);
        }else{
            $this->redirect('login');
        }
    }



}