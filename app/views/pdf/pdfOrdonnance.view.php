
 <?php $totale=null; $output='<!DOCTYPE html>
  <html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Page Title</title>
        <style>
            *{margin:10px 5px 5px 10px;padding:0}
        </style>
    </head>
    <body>
     <table width="100%" style="border-collapse: collapse; border: 1px;" align="center"> 
        <tr>
            <td width="50%">
                <h4 style=""><span>Ministère de la santé</span></h4><br>
                <p style="margin-top:-15px"><span>Direction Régionale de la Santé de Ségou</span></p> <br>
                <h4 style="margin-top:-15px"><span>Cabinet Médical Wassa</span></h4><br>
                <p style="margin-top:-15px"><span style="border-bottom: 2px solid #000">Tel:</span> <span>(0023) 73 12 33 01</span></p>
            </td>
            
            <td width="20%"> <span > N° D\'ORDRE :</span></td>    

            <td width="" >
               <input style="border: #9fadba solid 1px;height: 20px;width: 120px;" type="text" class="form-group">

            </td>

        </tr> 
        <tr>
           
            <td >
                <img  src="http://localhost/cabinetwassa2/public/images/logowassa7.png" alt="" width="80" style="margin-left:350px">
            </td>
             <td></td>
            <td > 
                <h4style="font-seize:11px"><span>Date : '.date('d/m/Y').'</span></h4><br>
            </td>
                   
        </tr>
       
    </table>
         
        <h4 style="text-decoration:underline; margin-top:-0px" align="center"><span>ORDONNANCE</span></h4>
          
         <h5><span>Nom et Prénom :</span> <span>&nbsp;&nbsp;'.$patient->nom_patient.'&nbsp;&nbsp;&nbsp;'.$patient->prenom_patient.'</span><span style=" margin-left:80px">Age :</span><span>'.$patient->age_patient.'</span><span style=" margin-left:100px">Sexe:</span> <span>'.$patient->genre.'</span></h5>
         <h4><span>DIAGNOTIQUE:...........................................................................................................................</span></h4>

        <table width="97%" style="border-collapse: collapse; border: 0px;">
                    <tr style="border: 1px solid #000;font-weight:bold">
                        <th style="border: 1px solid; padding:5px;" width="80%">TRAITEMENT </th>
                        <th style="border: 1px solid; padding:5px;" width="0%">PRIX</th>
                    </tr>  
                
                    <tr>';


                        $sql="SELECT * FROM ordonnance 
                         INNER JOIN ligne_vente ON ordonnance.num_ordo=ligne_vente.num_ordo 
                INNER JOIN medicament ON medicament.idMedicament = ligne_vente.id_lot
                                   WHERE ordonnance.num_ordo =:id";
                        try {

                            $stmt = $bdd->prepare($sql);

                            $stmt->execute([':id'=>$idOrdo]);

                            $results = $stmt->fetchAll(PDO::FETCH_OBJ);

                            $stmt->closeCursor();


                        }catch ( Exception $e ) {

                            die ( $e->getMessage() );
                        }

                                // code...
                          $output.='<td style="border: 1px solid; padding:5px;"><b ></b> <br>';

                          foreach ($results as $result ) {

                                 $output.=""."$result->dci.............$result->dosage...........$result->forme......... ($result->quantite_prescite) <br>
                                           <hr style='margin-left: -2px;width: 90%'/>
                                            $result->posologie <br><br>";

                                }

                          $output.='</span>

                        </td>';



                        $output.='<td style="border-bottom: 1px solid #000; border-right: 1px solid #000; border-top: none">';
                                   foreach ($results as $prix ) {
                                       if($prix->statut_ordo===null){
                                           $output.='<br>
                                          
                                              <p>  <span STYLE="margin-left: 50px">X</span> </p>
                                              
                                          <br>
                                             ';
                                       }else{
                                           $output.='
                                          <br><br>
                                              <p>'.$prix->quantite_prescite*$prix->prix_vente.' CFA</p>
                                          <br>
                                             ';
                                       }


                                }
                          $output.='</td>';

        $output.='</tr>
                  
                  
         </table>
         
          <table width="97%" style="border-collapse: collapse; border: 0px;">
                    <tr style="border: 1px solid #000;font-weight:bold">
                        <th style="border: 1px solid; padding:5px;text-align: right" width="80%">MONTANT TOTAL</th>
                        <th style="border: 1px solid; padding:5px;" width="0%">';
                                   foreach ($results as $total ) {

                                     $totale =$total->montant;

                                }
                                $output.="<p> $totale  CFA </p>";
                         $output.='</th>
                    </tr>  
                
                    <tr>
                        <td style="border: #fff; padding:5px;"><span style=""></span></td>
                        <td style="border:#fff; padding:15px 5px;text-align: center"><span STYLE="text-align: center">PRESCRIPTEUR</span><br></td>                    
                    </tr>
                    <tr>
                    <td style="border: #fff; padding:5px;"><span style=""></span></td>
                    <td style="border:#fff; padding:5px;text-align: center">'.$patient->nom_medecin.' '.$patient->prenom_medecin.'<br></td>
                    </tr>
                  
                  
         </table>
    </body>

</html>';
       