<?php

include_once "../../system/DataBase.php";

/**
 * This class defines the main parameters in the Logs table.
 */
class BaseLog extends DataBase {

    private $database;
    private $data_log;
    private $table_name;

    function __construct($data = null) {
        $this->structureTable();
        $this->database = new DataBase();

        if($data){
            $data = $this->initData($data, $this->data_log);

            $this->data_columns = $this->initColumns($data, 0);
            $this->data_columns_values = $this->initColumns($data, 1);
            $this->data_init = $this->dataPreparation($data, $this->data_log);
        }
    }

    /**
	 * Logs Structure.
	 *
	 * Structure of the Logs table with their respective details.
	 *
	 * @since 0.0.1
	 */
    function structureTable(){

        $this->table_name = "base_log";

        $this->data_log = array(
            "id" => null,
            "base_customer" => null,
            "model_type" => null,
            "model_id" => null,
            "description_log" => null,
            "action" => null,
            "operation_date" => null,
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
        "id" => null,
        "base_customer" => 1000,
        "model_type" => 'Log',
        "model_id" => 1,
        "description_log" => 'Log',
        "action" => 'I',
        "operation_date" => '2020-11-30'
    );

    $app = new BaseLog($log);
    $query = $app->query_insert();
    echo $query;
# ====== Test ====== #

?>