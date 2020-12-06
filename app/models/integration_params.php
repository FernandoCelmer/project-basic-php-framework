<?php

include_once "../../system/config/DataBase.php";

/**
 * This class defines the main parameters in the Integration Params table.
 */
class BaseLog extends DataBase {

    private $database;
    private $data_log;
    private $table_name;

    function __construct($data = null) {
        $this->structureTable();
        $this->data_init = $this->initData($data, $this->data_log);
    }

    /**
	 * Integration Params Structure.
	 *
	 * @since 0.0.1
	 */
    function structureTable(){

        $this->table_name = "integration_params";

        $this->data_log = array(
            "id" => null
        );
    }

    function query_insert(){
        return $this->data_init;
    }

    function query_update(){
        return $this->data_init;
    }

    function query_delete(){
        return $this->data_init;
    }

}

?>