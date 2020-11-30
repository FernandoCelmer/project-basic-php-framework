<?php

include_once "../../system/config/DataBase.php";

class BaseSettings extends DataBase {

    private $database;
    private $data_settings;

    function __construct($data = null) {
        $this->structureTable();
        $this->data_init = $this->initData($data, $this->data_settings);
    }

    function structureTable(){
        $this->data_settings = array(
            "id" => null,
            "status" => null,
            "version" => null,
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
    "id" => 1,
    "status" => 1,
    "version" => '1.0',
);

$app = new BaseSettings($log);
$lista = $app->query_insert();
var_dump($lista);
# ====== Test ====== #

?>