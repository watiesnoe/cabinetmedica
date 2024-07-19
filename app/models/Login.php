<?php

class Login extends Model{

    public $errors=[];


    public function verificationLogin($champ=[]){
        $bdd=$this->bdd();
        if($this->selectCount('*','medecin')==0){
            $pseudo="supadmin@supadmin.com";
            $motdepasse=123456;
            $nom="SNT";
            $prenom="Traoré";
            $role='supAdmin';
            try{

                $bdd->beginTransaction();


                if (count($this->errors)==0){

                    $q=$this->insertion_update_simples('insert into structure  (nom_structure) values(:nomStructure)',
                        [':nomStructure'=>"direction"]);

                    $motpasses=$this->bcript_hash_password($motdepasse);


                    $q = $bdd->prepare('INSERT INTO medecin (nom_medecin,prenom_medecin,specialite,pseudo,mot_de_passe,num_structure)
                               VALUES (:nom_medecin,:prenom_medecin,:specialite,:pseudo,:mot_de_passe,:num_structure)');
                    $succes=$q->execute([
                        ':pseudo'=>$pseudo,
                        ':mot_de_passe'=>$motpasses,
                        ':specialite'=>$role,
                        ':num_structure'=>1,
                        ':nom_medecin'=>$nom,
                        ':prenom_medecin'=>$prenom
                    ]);

                }else{

                    $this->save_input_data();
                }

                $bdd->commit();

            } catch (Exception $e) {

                $bdd->rollback();

                //on affiche un message d'erreur ainsi que les erreurs
                echo 'Tout ne s\'est pas bien passé, voir les erreurs ci-dessous<br />';
                echo 'Erreur : '.$e->getMessage().'<br />';
                echo 'N° : '.$e->getCode();

                //on arrête l'exécution s'il y a du code après
                exit();
            }
       }else{

           if ($this->VerifyFields($champ)){

               $this->e(extract($_POST));

               $user=$this->FetchSelectWhere("num_medecin,pseudo,specialite,mot_de_passe As hashed_password",'medecin',"pseudo=:identifiant",['identifiant' => $pseudo]);


               if (isset($user->hashed_password) and $this->bcript_verify_password($password,$user->hashed_password)) {

                   $_SESSION['user_id']=$user->num_medecin;
                   $_SESSION['pseudo']=$user->pseudo;
                   //$_SESSION['email']=$user->email;
                   $_SESSION['role']=$user->specialite;
                   //$_SESSION['codeService']=$user->codeStructure;
                   $this->redirect('Home');
               } else {
                   $this->set_flash('Combinaison Identifiant /password incorrecte', 'danger');
               }

           }else{
               $this->set_flash("L'un des champs est vide.",'danger');
           }
       }

    }

}