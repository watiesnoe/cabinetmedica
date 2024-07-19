<?php
/**
 * Created by PhpStorm.
 * User: SNT
 * Date: 21/11/2022
 * Time: 12:24
 */
class Database{

        function connect (){

            $string = DBDRIVER.":host=".DBHOST.";dbname=".DBNAME;

            if (!$bdd=new PDO($string,DBUSER,DBPASS)) {
               
               die('echec de connection a la bas de données');
            };
            return $bdd;
        }


        /*Parties
         sur les insertions
         * */



        public function bdd(){
            $bdd= $this->connect();
            return $bdd;
        }
    // fin des fonction de sseclect
//function pour verification de l'utilisateur

}