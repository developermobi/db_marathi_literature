<?php

/**
 * Description of db_connect
 *
 *  @author sms
 *  Database connection Class
 */

class db_connect {
    protected $mysqli;
    
    function __construct() {
        //create Database connection 
		@$this->mysqli = new mysqli("localhost", "root", "Mysql@!234$#$", "db_festival");
        if (mysqli_connect_errno()) {
            printf("Error: Unable To Connect Database");
            exit();
        }else{
            // return database object
            return $this->mysqli;   
        }
    }
    
    function __destruct() {
        @$this->mysqli->close(); // Close Database connection
        
    }  
}
//$obj = new db_connect();
?>