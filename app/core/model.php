<?php
class Model extends Database{
	protected $table="";

    public function VerifyFields($fields=[]){
        if (count($fields) > 0) {
            foreach ($fields as $field) {
                if (empty($_POST[$field]) || trim ($_POST[$field]) === '') {
                    return false;
                }
            }
            return true;
        }
    }
    protected function VerifyField($fields=[]){

        if (count($fields) != 0) {

            foreach ($fields as $field) {

                if (empty($_POST[$field])) {
                    return false;
                }
            }
            return true;
        }


    }

    //    html verify data
    public function e($value){

        if ($value){
            $value=htmlspecialchars($value);
            $value=htmlentities($value);
            $value=strip_tags($value);
            return $value;
        }
    }

//   data cript data
    public  function bcript_hash_password($value,$options=array())

    {
        $cost= isset($options['rounds'])? $options['rounds']:10;
        $hash=password_hash($value,PASSWORD_BCRYPT,array('cost'=>$cost));
        if($hash===false){
            throw new Exception("Bcript hashing n'est pas suporte.");
        }
        return $hash;

    }
//    mot de pass verification
    public function bcript_verify_password($value,$hashedValue)
    {
        return password_verify($value,$hashedValue);

    }
// selection des utilisateur
    /* private function utilisateur($field,$value){

         $que = $this->db->prepare("SELECT idUt
             FROM agent JOIN utilisateur ON agent.numAgent=utilisateur.numAgent

             WHERE $field=?");

         $que->execute([$value]);
         $count = $que->rowCount();
         $que->closeCursor();
         return $count;
     }
 */


    public function chekErrorsInt($value,$entier,$message){

        if(strlen($value)<(int)$entier || strlen($value) > (int)$entier){
            return  array_push($this->errors,$message);
        }

    }

    public function chekErrorsString($value,$message){


        if(!is_numeric($value)){
            return array_push($this->errors,$message);
        }

    }

// edn des utilisateur

    //    set flash les (affichage des message)
    public function set_flash($message, $type = 'danger')
    {
        $_SESSION['notification']['message'] = $message;
        $_SESSION['notification']['type'] = $type;
    }
//   save input (enregistrement des contenue)
    public function save_input_data()
    {
        foreach ( $_POST as $key => $value) {
            if (strpos($key, 'password') == false) {
                $_SESSION['input'][$key] = $value;
            }

        }
    }
// get input key  (contenut)
    public function get_input($key)
    {
        return !empty($_SESSION['input'][$key])
            ?$this->e($_SESSION['input'][$key])
            : null;

    }
// the redirection script

    public  function redirect($page)
    {

        header("Location:".ROOT."/".trim($page,"/"));
        exit();
    }



//    partie clear input date fields
    public  function clear_input_data()
    {
        if (isset($_SESSION['input'])) {
            $_SESSION['input'] = [];
        }
    }

//    public function findAll($table){
//            $query="select * from $table ";
//            return $this->queryAll($query,"object");
//    }
//
//    public function findAllCounter($table){
//            $query="select * from $table ";
//            return $this->queryAllCounter($query,"object");
//    }
//
//    public function find($selsct,$table,$values,$data=[],$ordser=null){
//        $query="select $selsct from $table where $values=? $ordser";
//        return $this->query($query,$data,'object');
//    }
//
//    public function findCounter($selsct,$table,$values,$data=[],$ordser=null){
//        $query="select $selsct from $table where $values=? $ordser";
//        return $this->queryCounter($query,$data,'object');
//    }
//
//    public function find_fetch_table($table,$values=[]){
//        $query="select * from $table ";
//        return $this->query($query,$values,'object');
//    }

    public function select_data_table_join_where($select,$excute_data=[]){
        $bdd=$this->connect();
        $stm=$bdd->prepare($select);
        $stm->execute($excute_data);
        $data=$stm->fetch(PDO::FETCH_OBJ );
        return $data;
    }

    public function selectWhereCount($select=[],$fields,$whereValue,$value=[]){
        $bdd= $this->connect();
        $que = $bdd->prepare("SELECT $select
                FROM $fields
                WHERE $whereValue=?");
        $que->execute([$value]);
        $count = $que->rowCount();
        $que->closeCursor();
        return $count;
    }
    /*Partie slect count data
     * */
    public function selectCount($select=[],$fields){
        $bdd= $this->connect();
        $que = $bdd->prepare("SELECT $select
                FROM $fields");
        $que->execute();
        $count = $que->rowCount();
        $que->closeCursor();
        return $count;
    }
    /*
     * partie select end data
     *
     * */

    /* parite select find all avec where*/
    public function FetchAllSelectWhere($select,$fields,$whereValue,$value=[]){
        $bdd= $this->connect();
        $que = $bdd->prepare("SELECT $select
                FROM $fields
                WHERE $whereValue");
        $que->execute($value);
        $count = $que->fetchAll(PDO::FETCH_OBJ);
        $que->closeCursor();
        return $count;
    }
    /* end find  find all avec where*/

    /* parite select find avec where*/
    public function FetchSelectWhere($select,$fields,$whereValue,$value=[]){
        $bdd= $this->connect();
        $que = $bdd->prepare("SELECT $select
                FROM $fields
                WHERE $whereValue");
        $que->execute($value);
        $count = $que->fetch(PDO::FETCH_OBJ);
        $que->closeCursor();
        return $count;
    }
    /*partie  find all dataavec where */
    public function SelectData($select=[],$fields){
        $bdd= $this->connect();
        $que = $bdd->prepare("SELECT $select
                FROM $fields");
        $que->execute();
        $count = $que->fetch(PDO::FETCH_OBJ);
        $que->closeCursor();
        return $count;
    }
    /* end partie all data */
    /*partie  find  data avec where */

    public function SelectAllData($select,$fields){
        $bdd= $this->connect();
        $que = $bdd->prepare("SELECT $select
                FROM $fields");
        $que->execute();
        $count = $que->fetchAll(PDO::FETCH_OBJ);
        $que->closeCursor();
        return $count;
    }

    public function INSER($select=[],$fields){
        $bdd= $this->connect();
        $que = $bdd->prepare("SELECT $select
                FROM $fields");
        $que->execute();
        $count = $que->fetchAll(PDO::FETCH_OBJ);
        $que->closeCursor();
        return $count;
    }
    /* end find data avec where */
    /* PARTIE CODE INSERTION
     * */
        public function insertion_update_simples($insert,$insert_data=[]){
            $bdd=$this->connect();
            $q =$bdd->prepare($insert);
            $q->execute($insert_data);
            return $q;
        }
        public function insertion_update_simples_insert_id($insert,$insert_data=[]){
            $bdd=$this->connect();
            $q =$bdd->prepare($insert);
            $q->execute($insert_data);
            $data=["q"=>$q,'lastInsertId'=>$bdd->lastInsertId()];
            return $data;
        }
    /*
     * Fin de la partie insert
     * */
}