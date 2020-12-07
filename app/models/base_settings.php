<?php

include_once "../../system/DataBase.php";

/**
 * This class defines the main parameters in the Settings table.
 */
class BaseSettings extends DataBase {

    private $database;
    private $data_settings;

    function __construct($data = null) {
        $this->structureTable();

        if($data){
            $data = $this->initData($data, $this->data_log);

            $this->data_columns = $this->initColumns($data, 0);
            $this->data_columns_values = $this->initColumns($data, 1);
            $this->data_init = $this->dataPreparation($data, $this->data_log);
        }

        $this->database = new DataBase();
        $this->db = $this->database->initDatabase();
    }

    /**
	 * Settings Structure.
	 *
	 * Structure of the Settings table with their respective details.
	 *
	 * @since 0.0.1
	 */
    function structureTable(){

        $this->table_name = "base_settings";
        
        $this->data_settings = array(
            "id" => null,
            "status" => null,
            "version" => null,
        );
    }

    function query_insert(){
        $query = $this->database->data_insert(
            $this->table_name,
            $this->data_columns,
            $this->data_columns_values,
            $this->data_init
        );
        return $query;
    }

    function query_update(){
        return $this->data_init;
    }

    function query_delete(){
        return $this->data_init;
    }

}

# ====== Test ====== #
$log = array(
    "id" => 1,
    "status" => 1,
    "version" => '1.0',
);

$app = new BaseSettings($log);
$lista = $app->query_insert();
var_dump($lista);
# ====== Test ====== #

?>