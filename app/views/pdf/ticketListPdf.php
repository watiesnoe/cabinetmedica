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
       <h4 style='text-decoration:underline; margin-top:-0px' align='center'><span>Liste total des Tickets pris</span></h4><br>";
$output.='
        <table table width="97%" style="border-collapse: collapse; border: 0px;"> 
            <thead>
                <tr style="border: 1px solid #000; background-color:#129283; color:#fff; font-size:12px">
                    <th class="text-center" style="border: 1px solid; padding:5px;" width="15%">Nom patient</th>
                    <th class="text-center" style="border: 1px solid; padding:5px;" width="15%">Prenom Patient</th>
                    <th class="text-center" style="border: 1px solid; padding:5px;" width="5%">Age</th>
                    <th class="text-center" style="border: 1px solid; padding:5px;" width="15%">Type de ticket </th>
                   
                    <th class="text-center" style="border: 1px solid; padding:5px;" width="15%">Date de prise</th>
                    <th class="text-center" style="border: 1px solid; padding:8px;" width="15%">Date expiration</th>
                </tr>
            </thead>
            <tbody>';

    foreach ($results  as $patient){
    
    if ($patient->sexe=="" || $patient->resultatConsultation=="" || $patient->ethniPatient==""||$patient->telephonePat==""){

        $output.='  <tr>
                        <td class="text-center" style="border: 1px solid; padding:6px; font-size:10px;">'.$patient->nomPatient.'</td>
                        <td class="text-center" style="border: 1px solid; padding:6px; font-size:10px;">'.$patient->prenomPatient.'</td>
                        <td class="text-center" style="border: 1px solid; padding:6px; font-size:10px;">'.$patient->agePatient.'</td>
                        <td class="text-center" style="border: 1px solid; padding:6px; font-size:10px;">'.$patient->typeTicket.'</td> 
                        <td class="text-center" style="border: 1px solid; padding:6px; font-size:10px;">'.$patient->dateDebut.'</td>
                        <td class="text-center" style="border: 1px solid; padding:6px; font-size:10px;">'.$patient->dateFin.'</td>
                        
                       
                    </tr>';
    }

}
$output.=" </tbody>
         </table>
        </body>
      </html>
        ";