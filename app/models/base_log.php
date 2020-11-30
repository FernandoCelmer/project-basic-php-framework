<?php

include_once "../../system/config/DataBase.php";

class BaseLog extends DataBase {

    private $database;
    private $data_log;

    function __construct($data = null) {
        $this->structureTable();
        $this->data_init = $this->initData($data, $this->data_log);
    }

    function structureTable(){
        $this->data_log = array(
            "id" => null,
            "base_customer" => null,
            "model_type" => null,
            "model_id" => null,
            "description_log" => null,
            "action" => null,
            "date_time" => null,
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

# ====== Test ====== #
    $log = array(
        "id" => null,
        "base_customer" => 1000,
        "model_type" => 'Log',
        "model_id" => 1,
        "description_log" => 'Log',
        "action" => 'I',
        "date_time" => '2020-11-30'
    );

    $app = new BaseLog($log);
    $lista = $app->query_insert();
    var_dump($lista);
# ====== Test ====== #

?>