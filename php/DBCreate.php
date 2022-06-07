<?php

class CreateDB {
    public $host, $username, $password, $dbname, $tablename, $con;

    # Constructor
    public function __construct(
        $dbname = "Newdb",
        $tablename = "Productdb",
        $host = "localhost",
        $username = "root",
        $password = ""
    )
    {
        $this->dbname = $dbname;
        $this->tablename = $tablename;
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;

        # Create DB Connection
        $this->con = mysqli_connect($host, $username, $password);

        # Check connection
        if (!$this->con){
            die("Connection Failed: ". mysqli_connect_error());
        }

    # Query Create DB
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

    #Execute Query
    if (mysqli_query($this->con, $sql)){
        
        $this->con = mysqli_connect($host, $username, $password, $dbname);

        # Create Table
        $sql = " CREATE TABLE IF NOT EXISTS $tablename
        (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
        pname VARCHAR(25) NOT NULL,
        pprice FLOAT,
        pimg VARCHAR(1000)
        );";
        
        # Fail to execute query
        if (!mysqli_query($this->con, $sql)){
            echo "Error Creating this Table: ".mysqli_error($this->con);
        }
    }else{
        return false;
    }
    }
} 


// class CreateDB {
//     public $hostname, $username, $password, $dbname, $tablename, $con;

    # Constructor
    // public function __construct(
    //     $dbname = "scm",
    //     $tablename = "inventory",
    //     $hostname = "localhost",
    //     $username = "root",
    //     $password = ""
    // )
    // {
    //     $this->dbname = $dbname;
    //     $this->tablename = $tablename;
    //     $this->hostname = $hostname;
    //     $this->username = $username;
    //     $this->password = $password;

        # Create DB Connection
        // $this->con = mysqli_connect('$hostname', '$username', '$password', '$dbname')or die ("Connection Failed: ". mysqli_connect_error());

        // # Check connection
        // if (!$this->con){
        //     die("Connection Failed: ". mysqli_connect_error());
        // }
    // }

    

    # Get Inventory from DB
//     public function getData($sql){
//         $sql = "SELECT * FROM '$this->tablename'";
//         $result = mysqli_query($this->con, $sql);
//         if(mysqli_num_rows($result) > 0){
//             return $result;
//         }
//     }
// }