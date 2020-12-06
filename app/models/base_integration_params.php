<?php

include_once "../../system/config/DataBase.php";

/**
 * This class defines the main parameters in the Base Integration Params table.
 */
class BaseIntegrationParams extends DataBase {

    private $database;
    private $data_log;
    private $table_name;

    function __construct($data = null) {
        $this->structureTable();
        $this->data_init = $this->initData($data, $this->data_log);
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