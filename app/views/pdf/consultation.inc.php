
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
            <td width=""><img  src="assets/images/logowassa7.png" alt="" width="100"></td>       
            <td width="40%" >
                <h4 style="margin-top:-35px; margin-left:40px"><span style=" ">REPUBLIQUE DU MALI</span></h4>
                <p style="margin-top:-15px;margin-left:35px""><<span style=" margin-left:00px">Un Peuple - Un But - Une Foi</span></p>
            </td>       
        </tr> 
    </table>
    <br>
    <h4 style="text-decoration:underline; margin-top:-0px" align="center"><span>Liste total des Tickets pris</span></h4><br>

    <table table width="97%" style="border-collapse: collapse; border: 0px;"
        <thead>
            <tr style="border: 1px solid #000; background-color:#129283; color:#fff; font-size:12px">
                <th class="text-center" style="border: 1px solid; padding:5px;" width="5%">Nom patient</th>
                <th class="text-center" style="border: 1px solid; padding:5px;" width="5%">Prenom Patient</th>
                <th class="text-center" style="border: 1px solid; padding:5px;" width="2%">Age</th>
                <th class="text-center" style="border: 1px solid; padding:5px;" width="5%">Ethnie</th>
                <th class="text-center" style="border: 1px solid; padding:5px;" width="5%">Telephone</th>
                <th class="text-center" style="border: 1px solid; padding:2px;" width="2%">Genre</th>
                <th class="text-center" style="border: 1px solid; padding:5px;" width="5%">Date de Consult</th> 
                <th class="text-center" style="border: 1px solid; padding:5px;" width="5%">Diagnostique</th>  
            </tr>
        </thead>
        <tbody>';

       foreach ($datas  as $patient){

                $output.='<tr>
                    <td class="text-center" style="border-collapse:collapse ; border:1px solid;padding:6px; font-size:10px;">'.$patient->nomPatient.'</td>
                    <td class="text-center" style="border-collapse:collapse ; border:1px solid;padding:6px; font-size:10px;">'.$patient->prenomPatient.'</td>
                    <td class="text-center" style="border-collapse:collapse ; border:1px solid;padding:6px; font-size:10px;text-align:center">'.$patient->agePatient.'</td>
                    <td class="text-center" style="border-collapse:collapse ; border:1px solid;padding:6px; font-size:10px;">'.$patient->ethniPatient.'</td> 
                    <td class="text-center" style="border-collapse:collapse ; border:1px solid;padding:6px; font-size:10px;">'. $patient->telephonePat.'</td>
                    <td class="text-center" style="border-collapse:collapse ; border:1px solid;padding:6px; font-size:10px;text-align:center">'.$patient->sexe.'</td>
                    <td class="text-center" style="border-collapse:collapse ; border:1px solid;padding:6px; font-size:10px;">'.$patient->dateConsultation.'</td>
                    <td class="text-center" style="border-collapse:collapse ; border:1px solid;padding:6px; font-size:10px;">'.$patient->resultatConsultation.'</td>
                   </tr>';

        }

     $output.=" </tbody>
         </table>
        </body>

      </html>";
       