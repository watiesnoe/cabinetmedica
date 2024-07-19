<?php $output ='
 <!DOCTYPE html>
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
            <td width="40%">
                <h4 style=""><span>Ministère de la santé</span></h4><br>
                <p style="margin-top:-15px"><span>Direction Régionale de la Santé de Ségou</span></p> <br>
                <h4 style="margin-top:-15px"><span>Cabinet Médical Wassa</span></h4><br>
                <p style="margin-top:-15px"><span style="border-bottom: 2px solid #000">Tel:</span> <span>(0023) 73 12 33 01</span></p>
            </td>
            <td width=""><img  src="http://localhost/cabinetwassa2/public/images/logowassa7.png" alt="" width="100"></td>    
            <td width="40%" >
                <h4 style="margin-top:-35px; margin-left:40px"><span style=" ">REPUBLIQUE DU MALI</span></h4>
                <p style="margin-top:-15px;margin-left:35px""><<span style=" margin-left:00px">Un Peuple - Un But - Une Foi</span></p>
            </td>       
        </tr> 
    </table>';

$output.="<br>
       <h4 style='text-decoration:underline; margin-top:-0px' align='center'><span>Dossier du patient</span></h4><br>";
       $output .= '
      
            <table class="table table-bordered" width="90%" style="border-collapse: collapse; border: 0px; margin-left:90px"> 
            
            <tbody>';
                $output .= '  
                   <tr>
                        <td class="text" style=" padding:4px; font-size:12px;font-weight: bold">Nom du patient :</td>
                        <td class="text" style=" padding:4px; font-size:12px;">'.$item->nomPatient.'</td>
                   </tr>
                   <tr>
                        <td class="text" style=" padding:4px; font-size:12px;font-weight: bold">Prenom du patient:</td>
                        <td class="text" style=" padding:4px; font-size:12px;">'.$item->prenomPatient.'</td>
                   </tr>
                  
                   <tr>
                        <td class="text" style=" padding:4px; font-size:12px;font-weight: bold">Age du patient :</td>
                        <td class="text" style=" padding:4px; font-size:12px;">'.$item->agePatient.'</td>
                   </tr> 
                   <tr>
                        <td class="text" style=" padding:4px; font-size:12px;font-weight: bold">Ethnie du patient :</td>
                        <td class="text" style=" padding:4px; font-size:12px;">'.$item->ethniPatient.'</td>
                   </tr>
                   <tr>
                        <td class="text" style=" padding:4px; font-size:12px;font-weight: bold">Poids :</td>
                        <td class="text" style=" padding:4px; font-size:12px;">'.$item->poidPatient.'</td>
                   </tr> 
                   <tr>
                        <td class="text" style=" padding:4px; font-size:12px;font-weight: bold">Taille du patient :</td>
                        <td class="text" style=" padding:4px; font-size:12px;">'.$item->taillePat.'</td>
                   </tr>
                   <tr>
                        <td class="text" style=" padding:4px; font-size:12px;font-weight: bold">N° de Téléphone :</td>
                        <td class="text" style=" padding:4px; font-size:12px;">'.$item->telephonePat.'</td>
                   </tr>
                   <tr>
                        <td class="text" style=" padding:4px; font-size:12px;font-weight: bold">Poids/Taille:</td>';
                            $poidTaille=(($item->poidPatient)/$item->taillePat);
                        $output.='<td class="text" style=" padding:4px; font-size:12px;">'.ROUND($poidTaille,1).'</td>
                   </tr>'
                   ;

            $output.=" 
            </tbody>
            </table>";
            $output.="<br>
       <h4 style='text-decoration:underline; margin-top:-0px' align='center'><span>Les consultation effectuées</span></h4><br>";
$output.='
        <table table width="97%" style="border-collapse: collapse; border: 0px;"> 
            <thead>
                      <tr style="border: 1px solid #000; background-color:#129283; color:#fff; font-size:12px">
                        <th class="text-center" style="border: 1px solid; padding:5px;" width="5%">N°</th>
                        <th class="text-center" style="border: 1px solid; padding:5px;" width="5%">Date de consutlation</th>
                        <th class="text-center" style="border: 1px solid; padding:5px;" width="15%">Diagnostique</th>
                        
                    </tr>
            </thead>
            <tbody>';

            foreach ($datas  as $patient){
$output.='  
     <tr style="border-collapse:collapse ;padding:0px; margin:0px">
        <td class="text-center" style="border-collapse:collapse ; border:1px solid;padding:6px; font-size:10px;">'.$patient->idConsultation.'</td>
        <td class="text-center" style="border-collapse:collapse ; border:1px solid;padding:6px; font-size:10px;">'.$patient->dateConsultaion.'</td>
        <td class="text-center" style="border-collapse:collapse ; border:1px solid;padding:6px; font-size:10px;">'.$patient->resultatConsultation.'</td>
    </tr>';
                }
    $output.=" </tbody>
         </table>";

$output.="<br>
       <h4 style='text-decoration:underline; margin-top:-0px' align='center'><span>Les consultations effectuées par rendez-vous</span></h4><br>";
$output.='
        <table  width="97%" style="border-collapse: collapse; border: 0px;"> 
            <thead>
                      <tr style="border: 1px solid #000; background-color:#129283; color:#fff; font-size:12px">
                        <th class="text-center" style="border: 1px solid; padding:5px;" width="5%">N°</th>
                        <th class="text-center" style="border: 1px solid; padding:5px;" width="5%">Date de consutlation</th>
                        <th class="text-center" style="border: 1px solid; padding:5px;" width="15%">Diagnostique</th>
                        
                    </tr>
            </thead>
            <tbody>';
    foreach ($itemRDV  as $patient){
        $output.=' <tr style="border-collapse:collapse ;padding:0px; margin:0px">
            <td class="text-center" style="border-collapse:collapse ; border:1px solid;padding:6px; font-size:10px;">'.$patient->idConsultation.'</td>
            <td class="text-center" style="border-collapse:collapse ; border:1px solid;padding:6px; font-size:10px;">'.$patient->dateConsultaion.'</td>
            <td class="text-center" style="border-collapse:collapse ; border:1px solid;padding:6px; font-size:10px;">'.$patient->resultatConsultation.'</td>
        </tr>';
    }
$output.=" </tbody>
         </table>";
$output.="<br>
       <h4 style='text-decoration:underline; margin-top:-0px' align='center'><span>Les analyses realisées</span></h4><br>";
$output.='
        <table  width="97%" style="border-collapse: collapse; border: 0;"> 
            <thead>
                      <tr style="border: 1px solid #000; background-color:#129283; color:#fff; font-size:12px">
                        <th class="text-center" style="border: 1px solid; padding:5px;" width="5%">N°</th>
                        <th class="text-center" style="border: 1px solid; padding:5px;" width="8%">Type d\'analyse</th>
                        <th class="text-center" style="border: 1px solid; padding:5px;" width="8%">motif</th>
                        <th class="text-center" style="border: 1px solid; padding:5px;" width="6%">Date de Demande</th>
                        <th class="text-center" style="border: 1px solid; padding:5px;" width="7%">Date de reponse</th>
                        <th class="text-center" style="border: 1px solid; padding:5px;" width="10%">Reponse</th>
                        <th class="text-center" style="border: 1px solid; padding:5px;" width="7%">Medecin analyste</th>
                        
                    </tr>
            </thead>
            <tbody>';

foreach ($analyses  as $patient){
    $output.='  
         <tr style="border-collapse:collapse ;padding:0px; margin:0px">
            <td class="text-center" style="border-collapse:collapse ; border:1px solid;padding:6px; font-size:10px;">'.$patient->numDemanceExamen.'</td>
            <td class="text-center" style="border-collapse:collapse ; border:1px solid;padding:6px; font-size:10px;">'.$patient->nom.'</td>
            <td class="text-center" style="border-collapse:collapse ; border:1px solid;padding:6px; font-size:10px;">'.$patient->motif.'</td>
            <td class="text-center" style="border-collapse:collapse ; border:1px solid;padding:6px; font-size:10px;">'.$patient->dateDamande.'</td>
            <td class="text-center" style="border-collapse:collapse ; border:1px solid;padding:6px; font-size:10px;">'.$patient->dateReponse.'</td>
            <td class="text-center" style="border-collapse:collapse ; border:1px solid;padding:6px; font-size:10px;">'.$patient->bilanExamen.'</td>
            <td class="text-center" style="border-collapse:collapse ; border:1px solid;padding:6px; font-size:10px;">'.$patient->prenomMed.' '.$patient->nomMed.'</td>
        </tr>';
}
$output.=" </tbody>
         </table>";
$output.="</body>

      </html>";
       

