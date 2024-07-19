
 <?php $output='<!DOCTYPE html>
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
                <p style="margin-top:-15px;margin-left:35px""><span style=" margin-left:00px">Un Peuple - Un But - Une Foi</span></p>
            </td>       
        </tr> 
    </table>
    <br>
  <h4 style="text-decoration:underline; margin-top:-0px" align="center"><span>BULLETIN D\'ANALYSE  N° '.$patient->numDemanceExamen.'</span></h4>';

   $output .='
             <h5><span>Nom et Prénom :</span> <span>'.$patient->nom_patient.'&nbsp;&nbsp;'.$patient->prenom_patient.'</span><span style=" margin-left:250px">Age :</span><span>'.$patient->age_patient.'</span></h5>    ';

  $output .='
            <table width="97%" style="border-collapse: collapse; border: 0px;">
                    <tr style="border: 1px solid #000; background-color:#129283; color:#fff">
                        <th style="border: 1px solid; padding:5px;" width="20%">Demande</th>
                        <th style="border: 1px solid; padding:5px;" width="30%">Reponse</th>
                    </tr>';

                    $output .='    
                    <tr >
                        <td style="border: 1px solid; padding:5px;">'.$patient->code_examen.'</td>
                        <td style="border-bottom: none; border-right: 1px solid #000; border-top: 1px solid #fff; padding:5px;">'.$patient->bilanExamen.'</td>
                        
                    </tr>
                    <tr>
                        <td style="border: 1px solid; padding:5px;"><b style="text-decoration: underline">Renseignements cliniques :</b> <br> <span style="">'.$patient->motif_axamen.'</span></td>
                        <td style="border-bottom: 1px solid #000; border-right: 1px solid #000; border-top: none"></td>
                    </tr>
                    ';

     $output.="</table>";


                $output .="
                <table width='97%' style='border-collapse: collapse; border: 0px; margin-top:30px;'>
               
                     <tr style='border: 1px solid #FFF'>
                ";
                        $output .='
                            <td style=" padding:12px;" align="left">Ségou, le '.date('d/ m/ Y', strtotime($patient->dateDamande)).'</td>
                            <td style=" padding:12px;" align="left"></td>
                            <td style=" padding:12px;" align="left"></td>
                            <td style=" padding:12px;" align="right">Ségou, le ....../......../.......</td>
                        ';
                    $output .="
                     </tr>
                    <tr style='border: 1px solid #FFF'>
                        <th style=' padding:12px;text-decoration: underline' align='left' width='40%'>L' agent de santé</th>
                        <th style=' padding:12px;' width='15%'></th>
                        <th style=' padding:12px;' width='15%'></th>
                        <th style=' padding:12px;text-decoration: underline' align='right' width='30%'><span style'text-decoration: underline'>Le responsables</span></th>
                    </tr>
                    <tr>
                    ";
                        $output .="<td style=' padding:5px;' ><span></span><span>".$patient->prenom_medecin."  "." ". $patient->nom_medecin."</span></td>
                        <td style=' padding:12px;'><span></span></td>
                        <td style=' padding:12px;'><span></span></td>
                        <td style=' padding:12px;'><span></span></td>
                    
                            <td style=' padding:12px;' align='right'><span></span>&nbsp;&nbsp;<span></span></td>
                               
                        </tr>";

                $output .='
                </table>
                ';
     $output.="
        </body>

      </html>";
       