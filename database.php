<?php
require_once("config.php");
class Database {
    public $connection;

    function __construct()
    {
        $this->open_db_connection();
    }

    public function open_db_connection(){

        $this->connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);

        if(mysqli_connect_error())
        {
            die("connection failed".mysqli_connect_error());
        }

    }

    public function query($sql){

        $result = mysqli_query($this->connection,$sql);
        $this->confirm_query($result);
        return $result;
    }

    private function confirm_query($result){

        if(!$result)
        {
            die("Query Failed");
        }

    }

    public function escape_string($formData) {
        $formData= trim(stripslashes(htmlspecialchars( strip_tags(str_replace(array('(',')'),'',$formData ) ),ENT_QUOTES) ) );

        return $formData;
    }
    public function the_insert_id() {
        return mysqli_insert_id($this->connection);

    }


}

$database = new Database();


?>