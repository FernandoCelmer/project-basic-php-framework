<?php

include_once "../../system/DataBase.php";

/**
 * This class defines the main parameters in the Base Integration Params table.
 */
class BaseIntegrationParams extends DataBase {

    private $database;
    private $data_log;
    private $table_name;

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
	 * BaseIntegrationParams Structure.
	 *
	 * @since 0.0.1
	 */
    function structureTable(){

        $this->table_name = "base_integration_params";

        $this->data_log = array(
            "id" => null,
            "base_integration" => null,
            "name" => null,
            "label" => null
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

?>