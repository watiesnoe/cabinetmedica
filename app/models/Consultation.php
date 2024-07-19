<?php
class Consultation extends Model{

    public $errors=[];

    public function Patient($value=[],$antecedant_medicaux=null,$antecedant_chirigicale=null,$antecedant_familiale=null,$antecedant_autre=null){
        $bdd=$this->bdd();
        if ($this->VerifyFields($value)){
            $this->e(extract($_POST));
           
            try{
                $bdd->beginTransaction();

                // nom

                if (count($this->errors)==0){

                    $insertion=$this->insertion_update_simples('UPDATE ticket ti JOIN patient pat ON ti.idPatient=pat.num_patient
                        join consultation con ON con.num_ticket=ti.num_ticket
                        SET 
                        pat.adresse=:adresse_patient,
                        pat.fils_de=:fils,
                        pat.groupesangine=:groupesangine,
                        pat.stuation_matrimonial=:stuation_matrimonial,
                        pat.poids_patient=:poids,
                        pat.taille_patient=:taille,
                        con.resultat_diagnos=:diagnostique,
                        con.examen_clinic=:resultat_clinique,
                        ti.statut_ticket="utiliser",
                        con.antecedant_medicaux=:antecedant_medicaux,
                        con.antecedant_chirigicale=:antecedant_chirigicale,
                        con.antecedant_familiale=:antecedant_familiale,
                        con.antecedant_autre=:antecedant_autre
                         where con.num_consult=:id',
                        [
                        ":adresse_patient"=>$adresse_patient,
                        ":fils"=>$fils,
                        ":groupesangine"=>$groupesangine,
                        ":stuation_matrimonial"=>$stuation_matrimonial,
                        ":poids"=>$poids,
                        ":taille"=>$taille,
                        ":diagnostique"=>$diagnostique,
                        ":resultat_clinique"=>$resultat_clinique,
                        ":antecedant_medicaux"=>$antecedant_medicaux,
                        ":antecedant_chirigicale"=>$antecedant_chirigicale,
                        ":antecedant_familiale"=>$antecedant_familiale,
                        ":antecedant_autre"=>$antecedant_autre,
                        ":id"=>$edit
                    ]);
                if($insertion==true){
    
                    if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])&& $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
                        return json_encode(["Consultation"=>"Insertion reussie avec success"]);
                    }
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
            return array_push($this->errors,"Les champs ne doivent pas etre vide!! ");
        }

    }
    public function Modifiacation_consultation($vlaue=[],$antecedant_medicaux,$antecedant_chirigicale,$antecedant_familiale,$antecedant_autre){
        if ($this->VerifyFields($vlaue)){


            $this->e(extract($_POST));


           if(count($this->errors)==0){
               $insertion=$this->insertion_update_simples("UPDATE consultation con
                 SET 
                    con.resultat_diagnos=:resultat_diagnos,
                    con.antecedant_medicaux=:antecedant_medicaux,
                    con.antecedant_chirigicale=:antecedant_chirigicale,
                    con.antecedant_familiale=:antecedant_familiale,
                    con.antecedant_autre=:antecedant_autre,
                    con.num_medecin=:num_medecin,
                    con.examen_clinic=:examen_clinic
                WHERE con.num_consult=:id",
                [":antecedant_medicaux"=> $antecedant_medicaux,
                ":antecedant_chirigicale"=> $antecedant_chirigicale,
                ":antecedant_familiale"=> $antecedant_familiale,
                ":antecedant_autre"=> $antecedant_autre,
                ":resultat_diagnos"=> $diagnostique,
                ":num_medecin"=>$_SESSION['user_id'],
                ":examen_clinic"=>$resultat_clinique,
                ':id'=>$edit]);

               if($insertion==true){

                   if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])&& $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
                       return json_encode(["Consultation"=>"Insertion reussie avec success"]);
                   }
               }
           }

        }else{
            $this->save_input_data();
            return array_push($this->errors,"Les champs ne doivent pas etre vide!! ");
        }

    }
    public function Modifiacation_consultation_rdv($vlaue=[],$id,$antecedant_medicaux,$antecedant_chirigicale,$antecedant_familiale,$antecedant_autre){
        if ($this->VerifyFields($vlaue)){


            $this->e(extract($_POST));


           if(count($this->errors)==0){
                $updatePatient=$this->insertion_update_simples("UPDATE rendez_vous rdv   INNER JOIN consultation con ON con.idRendezVous=rdv.num_rendez
                SET 
                    con.date_consult=now(),
                    con.motif_consult=:motif_consult,
                    con.resultat_diagnos=:resultat_diagnos,
                    con.antecedant_medicaux=:antecedant_medicaux,
                    con.antecedant_chirigicale=:antecedant_chirigicale,
                    con.antecedant_familiale=:antecedant_familiale,
                    con.antecedant_autre=:antecedant_autre,
                    con.num_medecin=:num_medecin,
                    con.examen_clinic=:examen_clinic
                WHERE rdv.num_rendez=:id",
                [
                ":motif_consult"=> $motif_consultation,
                ":antecedant_medicaux"=> $antecedant_medicaux,
                ":antecedant_chirigicale"=> $antecedant_chirigicale,
                ":antecedant_familiale"=> $antecedant_familiale,
                ":antecedant_autre"=> $antecedant_autre,
                ":resultat_diagnos"=> $diagnostique,
                ":num_medecin"=>$_SESSION['user_id'],
                ":examen_clinic"=>$resultat_clinique,
                ':id'=>$id]);

                if($updatePatient){
                    $this->set_flash("Consultation reussie avec success" ,'success');
                }
           }

        }else{
            $this->save_input_data();
            return array_push($this->errors,"Les champs ne doivent pas etre vide!! ");
        }

    }
    // public function Consultation_rdv($vlaue=[],$id,$antecedant_medicaux,$antecedant_chirigicale,$antecedant_familiale,$antecedant_autre){
        
    //     if ($this->VerifyFields($vlaue)){

    //         $this->e(extract($_POST));

    //        if(count($this->errors)==0){
    //             $updatePatient=$this->insertion_update_simples("INSERT INTO consultation (date_consult,motif_consult,resultat_diagnos,antecedant_medicaux,antecedant_chirigicale,antecedant_familiale,antecedant_autre,num_medecin,examen_clinic,idRendezVous)
    //                 VALUES(NOW(),:motif_consult,:resultat_diagnos,:antecedant_medicaux,:antecedant_chirigicale,:antecedant_familiale,:antecedant_autre,:num_medecin,:examen_clinic,:idRendezVous)
    //                            ",
    //             [
    //             ":motif_consult"=> $motif_consultation,
    //             ":antecedant_medicaux"=> $antecedant_medicaux,
    //             ":antecedant_chirigicale"=> $antecedant_chirigicale,
    //             ":antecedant_familiale"=> $antecedant_familiale,
    //             ":antecedant_autre"=> $antecedant_autre,
    //             ":resultat_diagnos"=> $diagnostique,
    //             ":num_medecin"=>$_SESSION['user_id'],
    //             ":examen_clinic"=>$resultat_clinique,
    //             ':idRendezVous'=>$id]);

    //             if($updatePatient){
    //                 $this->set_flash("Consultation reussie avec success" ,'success');
    //             }
    //        }

    //     }else{
    //         $this->save_input_data();
    //         return array_push($this->errors,"Les champs ne doivent pas etre vide!! ");
    //     }

    // }
    public function Consultation_rdv($value=[],$antecedant_medicaux=null,$antecedant_chirigicale=null,$antecedant_familiale=null,$antecedant_autre=null){
        $bdd=$this->bdd();
        if ($this->VerifyFields($value)){
            $this->e(extract($_POST));
           
            try{
                $bdd->beginTransaction();

                if (count($this->errors)==0){
                        $insertion=$this->insertion_update_simples('INSERT INTO consultation (resultat_diagnos,idpatient,num_medecin,
                            examen_clinic,antecedant_medicaux,antecedant_chirigicale,
                            antecedant_familiale,antecedant_autre,idRendezVous) 
                            VALUES (:resultat_diagnos,:idpatient,:num_medecin,
                            :examen_clinic,:antecedant_medicaux,:antecedant_chirigicale,
                            :antecedant_familiale,:antecedant_autre,:idRendezVous)',
                            [':resultat_diagnos'=>$diagnostique,
                                ':idpatient'=>$patient,
                                ':num_medecin'=>$_SESSION['user_id'],
                                ':examen_clinic'=>$resultat_clinique,
                                ':antecedant_medicaux'=>$antecedant_medicaux,
                                ':antecedant_chirigicale'=>$antecedant_chirigicale,
                                ':antecedant_familiale'=>$antecedant_familiale,
                                ':antecedant_autre'=>$antecedant_autre,
                                ':idRendezVous'=>$edit
                            ]);
                        if($insertion==true){
                            if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])&& $_SERVER['HTTP_X_REQUESTED_WITH']=='XMLHttpRequest'){
                                return json_encode(["Consultation"=>$diagnostique]);
                            }
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
            return array_push($this->errors,"Les champs ne doivent pas etre vide!! ");
        }

    }
   
}

?>