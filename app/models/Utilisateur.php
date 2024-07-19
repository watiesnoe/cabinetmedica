<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 11/03/2023
 * Time: 23:24
 */

class Utilisateur extends Model
{
 public $errors=[];


     public function insertionUpdate_function($vlaue=[],$profile=null,$image_tempo=null){

         if ($this->VerifyFields($vlaue)){

             $bdd=$this->bdd();

             $this->e(extract($_POST));
             if (isset($numAgent)) {
                    
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $this->errors[] = "Adresse email invalide!";
                }

                $this->chekErrorsInt($telephone,8,"Le numero de telephone doit comporter 8 chiffre");
                $motpasse_cripter=$this->bcript_hash_password($motdepasse);

                if (count($this->errors)==0){
                    $q=$this->insertion_update_simples('UPDATE medecin 
                        SET
                        nom_medecin=:nom_medecin,
                        prenom_medecin=:prenom_medecin,	
                        specialite=:specialite,	
                        numero_tele=:numero_tele,	
                        adresse_email=:adresse_email,	
                        pseudo=:pseudo,	
                        mot_de_passe=:mot_de_passe,
                        num_structure=:num_structure,
                        genre=:genre 	
                        WHERE num_medecin=:id 
                    ',
                        [
                            ':nom_medecin'=>$nom,
                            ':prenom_medecin'=>$prenom,
                            ':genre'=>$genre,
                            ':numero_tele'=>$telephone,
                            ':mot_de_passe'=>$motpasse_cripter,
                            ':adresse_email'=>$email,
                            ':pseudo'=>$pseudo,
                            ":num_structure"=>$codeStructure,
                            ':specialite'=>$role,
                            ":id"=>$numAgent
                            ]);
                    if($q){

                        $this->set_flash("Information modifier avec success.",'success');
                        $this->clear_input_data();
                    }

                }else{
                    $this->save_input_data();
                }
             }else{
                if (count($this->errors)==0){

                    try{

                        $bdd->beginTransaction();
                        move_uploaded_file($image_tempo, 'C:/xampp/htdocs/cabinetwassa2/public/uplode_fille/'. $profile);
   
                        if($this->FetchSelectWhere('pseudo','medecin','pseudo=:pseudo',[":pseudo"=>$pseudo])){
   
                            $this->errors[]="Ce pseudo exsiste déja,veillez choisie un notre";
                        }
   
                        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
   
                            $this->errors[] = "Adresse email invalide!";
   
                        }
   
                        if($this->FetchSelectWhere('adresse_email','medecin','adresse_email=:adresse_email',[":adresse_email"=>$email])){
   
                            $this->errors[]="Adresse déja utiliser";
   
                        }
   
                        $this->chekErrorsInt($telephone,8,"Le numero de telephone doit comporter 8 chiffre");
   
                        if($this->FetchSelectWhere('numero_tele','medecin','numero_tele=:numero_tele',[":numero_tele"=>$telephone])){
   
                            $this->errors[]="Nomero de telephone déja  utiliser";
   
                        }
   
                        if($motdepasse!=$mot_de_passe_confirme){
                            $this->errors[]="Le mot de passe et le mot de passe confirme ne sont pas identique";
                        }
   
                        if (count($this->errors)==0){
   
                            $motpasses=$this->bcript_hash_password($motdepasse);
   //                    	adresse_email		profile_medecin	num_structure	genre
                            $utilisateur = $bdd->prepare('INSERT INTO medecin (nom_medecin,prenom_medecin,specialite,numero_tele,adresse_email,pseudo,mot_de_passe,profile_medecin,num_structure,genre) 
                                                   VALUES (:nom_medecin,:prenom_medecin,:specialite,:numero_tele,:adresse_email,:pseudo,:mot_de_passe,:profile,:num_structure,:genre)');
   
                            $utilisateur->execute([
                               ":nom_medecin"=>$nom,
                               ":prenom_medecin"=>$prenom,
                               ":specialite"=>$role,
                                ":numero_tele"=>$telephone,
                                ":adresse_email"=>$email,
                                ":pseudo"=>$pseudo,
                                ":mot_de_passe"=>$motpasses,
                                ':profile'=>$profile,
                                ":num_structure"=>$codeStructure,
                                ":genre"=>$genre
                               ]);
   
                            if($utilisateur){
                                $this->set_flash("Votre utilisateur est enregister avec success.",'success');
                                $this->clear_input_data();
                            }else{
                                $this->set_flash("Erreur lors de l'ajout du code source;Veuillez reessayer SVP.");
                                $this->save_input_data();
   
                            }
   
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
                    $this->save_input_data();
                }
             }

    

         }else{
             $this->save_input_data();
             return array_push($this->errors,"Les champs ne doivent pas etre vide!! ");
         }

     }
}