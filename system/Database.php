<?php

include_once __DIR__ . "/Config/config.php";

/**
 * This class defines the main parameters and standard methods for the application's database.
 */
class DataBase extends Config {

    protected $link;
    private $host;
    private $username;
    private $password;

    public function __construct() {
        $this->host = $this->env('DB_HOST');
        $this->username = $this->env('DB_USERNAME');
        $this->dataname = $this->env('DB_DATABASE');
        $this->password = $this->env('DB_PASSWORD');
    }
    
    /**
     * Connect DataBase.
     *
     * It makes a connection to the database and returns a schema otherwise it returns false.
     * 
     * @since 0.0.1
     *
     * @return object|false Schema of Database.
     */
    private function connectDatabase() {
        try {
            $this->link = new PDO('mysql:host='.$this->host.';dbname='.$this->dataname, $this->username, $this->password);
            $this->link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
            
            return $this->link;

        } catch(PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }

    /**
     * Init Database
     *
     * @since 0.0.1
     *
     * @return object|false Schema of Database.
     */
    public function initDatabase(){
        return $this->connectDatabase();
    }

    /**
     * Create Database
     *
     * @since 0.0.1
     *
     * @return true Returns True.
     */
    public function createDatabase(){
        return True;
    }

    /**
     * Database Initialization
     *
     * It manipulates the information received to conform to the specific serus models.
     *
     * @since 0.0.1
     *
     * @param array $data - Formatting information.
     * @param array $data_log - Model information.
     * @return array Returns formatted information without null fields.
     */
    public function initData($data, $data_log){
        if ($data){
            foreach ($data_log as $key => $item){
                if(isset($data[$key])){
                    if ($data[$key]){
                        $data_log[$key] = $data[$key];
                    }else{
                        unset($data_log[$key]);
                    }
                }else{
                    unset($data_log[$key]);
                }
            }
            return $data_log;
        }else{
            return False;
        }
    }

    /**
     * Init Columns
     *
     * It manipulates the information received to conform to the specific serus models.
     *
     * @since 0.0.1
     *
     * @param array $data - Formatting information.
     * @return string Return an string only formatted columns.
     */
    public function initColumns($data, $tip){
        $columns = array();
        foreach ($data as $key => $item){
            array_push($columns, $key);
        }
        if ($tip == 0){

            // Transforms array into string, adding "comma" between each information.
            $columns_separated = implode(",", $columns);
            return $columns_separated;

        }elseif($tip == 1){

            // Add "colon" (:) in the before the name of each column.
            foreach ($columns as $key =>  $item){
                $temp = ':'.$columns[$key];
                $columns[$key] = $temp;
            }

            $columns_separated = implode(",", $columns);
            return $columns_separated;
        }

    }

    /**
     * Column Preparation
     *
     * Change the column keys for insertion into the database.
     *
     * @since 0.0.1
     *
     * @param array $data - Formatting information.
     * @return array Returns formatted information.
     */
    public function dataPreparation($data){

        // Add "colon" (:) in the before the name of each key in the array.
        foreach ($data as $key => $item){
            $data[':'.$key] = $data[$key];
            unset($data[$key]);
        }
        return $data;
    }

    function data_insert($table_name, $data_columns, $data_columns_values, $data_init){
        $db = $this->initDatabase();
        try {
            $stmt = $db->prepare('INSERT INTO .' . $table_name . '('. $data_columns .') VALUES('. $data_columns_values .')');
            $stmt->execute($data_init);

            return $db->lastInsertId();
            
        } catch(PDOException $e) {

            return 'Error: ' . $e->getMessage();
        }
    }

    function data_update($table_name, $data_columns, $data_columns_values, $data_init){
        return True;
    }

    function data_delete($table_name, $id){
        return True;
    }

}

?>
