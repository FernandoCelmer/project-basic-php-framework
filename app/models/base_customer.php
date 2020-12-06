<?php

include_once "../../system/config/DataBase.php";

class BaseCustomer extends DataBase {

    private $database;
    private $data_customer;

    function __construct($data = null) {
        $this->structureTable();
        $this->data_init = $this->initData($data, $this->data_customer);
    }

    function structureTable(){

        $this->table_name = "base_customer";

        $this->data_customer = array(
            "id" => null,
            "user" => null,
            "email" => null,
            "password" => null,
            "status" => null,
            "image" => null,
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
    "user" => "User",
    "email" => "php@teste.com",
    "password" => 'X5SDF1651FSFDSF15D1F',
    "status" => 1,
    "image" => null,
);

$app = new BaseCustomer($log);
$lista = $app->query_insert();
var_dump($lista);
# ====== Test ====== #

?>