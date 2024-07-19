<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 17/03/2023
 * Time: 20:07
 */

class Fournisseurs extends Controller
{
    public function index(){
        
        if (isset($_SESSION['pseudo'])){

            $fournisseur=new Fournisseur();

            if (isset($_POST['submit'])){

                $fournisseur->insertionUpdate_function(['nomfourni','adresseFourni','telFourni']);
            }
            $this->view('ajouter_fournisseur');

        }else{
            $this->redirect('login');
        }
    }

    public function liste(){
        if (isset($_SESSION['pseudo'])){

            $fournisseur=new Fournisseur();
            $fournisseurs=$fournisseur->SelectAllData("*",'fournisseur');
            $this->view('fournisseur',['fournisseurs'=>$fournisseurs]);

        }else{
            $this->redirect('login');
        }
    }
    public function edit($id)
    {
        if (isset($_SESSION['pseudo'])){
            $fournisseur=new Fournisseur();

            if (isset($_POST['modifier'])){

                $fournisseur->insertionUpdate_function(['idFournisseur','nomfourni','adresseFourni' ,'telFourni']);
            }

                $fournisseurs=$fournisseur->FetchSelectWhere('*','fournisseur','id_fournisseur=:id ',[":id"=>$id]);
            $this->view('ajouter_fournisseur',["fournisseur"=>$fournisseurs,'id'=>$id]);

        }else{
            $this->redirect('login');
        }

    }
    public function store()
    {
        if (isset($_SESSION['pseudo'])){

            $fournisseur=new Fournisseur();

            if (isset($_POST['telephone_fournisseur'])){

               echo  $fournisseur->insertionUpdate_function_modale(['telephone_fournisseur','adresse_fournisseur','nom_fournisseur']);exit();
               
            }

        }else{
            $this->redirect('login');
        }

    }
    public function selecte_fournisseur()
    {
        if (isset($_SESSION['pseudo'])){
            $output='';
            $fournisseur=new Fournisseur();
            $fetch=$fournisseur->SelectAllData('*','fournisseur');
            $output.='<option>Selectionner Ici un fournisseur</option>';
            foreach ($fetch as $item) {
                $output.='<option value="'.$item->id_fournisseur.'">'.$item-> nom_fournisseur.' '.$item-> adresse_fournisseur.' '.$item->telephone_fournisseur.'</option>';
            }

            if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])&& $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){

                echo json_encode($output);exit();
            }
        }else{
            $this->redirect('login');
        }

    }


}