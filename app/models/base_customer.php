<?php

include_once "../../system/DataBase.php";

/**
 * This class defines the main parameters in the Customer table.
 */
class BaseCustomer extends DataBase {

    private $database;
    private $data_customer;

    function __construct($data = null) {
        $this->structureTable();

        if($data){
            $data = $this->initData($data, $this->data_customer);

            $this->data_columns = $this->initColumns($data, 0);
            $this->data_columns_values = $this->initColumns($data, 1);
            $this->data_init = $this->dataPreparation($data, $this->data_customer);
        }

        $this->database = new DataBase();
        $this->db = $this->database->initDatabase();
    }

    /**
	 * Customers Structure.
	 *
	 * Structure of the Customer table with their respective details.
	 *
	 * @since 0.0.1
	 */
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
        "user" => "User",
        "email" => "php@teste.com",
        "password" => 'X5SDF1651FSFDSF15D1F',
        "status" => 1,
        "image" => null,
    );

    $app = new BaseCustomer($log);
    $query = $app->query_insert();
    echo $query;
# ====== Test ====== #

?>