<?php


class MateriasDB{


    //Propiedades 

    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $tablename;
    public $con;
    

    // Constructor 
    public function __construct(
        $dbname = "NewDB", 
        $tablename = "Materias", 
        $servername = "localhost", 
        $username = "root", 
        $password = ""
    ){

        $this-> dbname = $dbname;
        $this-> tablename = $tablename;
        $this-> servername = $servername;
        $this-> username = $username;
        $this-> password = $password;

        // Connection
        $this-> con = mysqli_connect($servername, $username, $password);

        if (!$this->con){
            die("Algo fallo en la conexion : " . mysqli_connect_error());
        }

        // crear Base de datos 'QUERY'
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        if(mysqli_query($this->con, $sql)){
            // Conectar
            $this->con = mysqli_connect($servername, $username, $password, $dbname);
            
            // Modelo de las base de datos 
            $sql = " CREATE TABLE IF NOT EXISTS $tablename
                            (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                             materia_name VARCHAR (25) NOT NULL,
                             materia_image VARCHAR (100)
                            );";

            if (!mysqli_query($this->con, $sql)){
                echo "Error creating table : " . mysqli_error($this->con);
            }
        
        }else{
            return false;
        }


    }

    // obtener Materias 
    public function getData(){
        $sql = "SELECT * FROM $this->tablename";

        $result = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }




}
