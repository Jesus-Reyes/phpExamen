<?php

class EstudiantesDB{
    
    public $servername;
    public $username;
    public $password;
    public $dbname;
    public $tablename;
    public $con;

    // Constructor 
    public function __construct(
        $dbname = "EstudiantesDB", 
        $tablename = "Estudiantes", 
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
            die("Algo fallo en la conexion a la Base de datos Estudiantes: " . mysqli_connect_error());
        }

        // crear Base de datos 'QUERY'
        $sql = "CREATE DATABASE IF NOT EXISTS $dbname";

        if(mysqli_query($this->con, $sql)){
            // Conectar
            $this->con = mysqli_connect($servername, $username, $password, $dbname);
            
            // Modelo de las base de datos 
            $sql = " CREATE TABLE IF NOT EXISTS $tablename
                            (id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
                             name VARCHAR (25) NOT NULL,
                             Historia VARCHAR (25) NOT NULL,
                             Programacion VARCHAR (25) NOT NULL,
                             Matematicas VARCHAR (25) NOT NULL,
                             Calculo VARCHAR (25) NOT NULL
                             
                            );";

            if (!mysqli_query($this->con, $sql)){
                echo "Error creating table : " . mysqli_error($this->con);
            }
        
        }else{
            return false;
        }

    }

    public function setEstudiante($query){

        $result = mysqli_query($this->con, $query);
        if(!$result){
            die("Query failed");
        }
        session_unset();
        // Redireccionar al inicio 
        header("Location: http://localhost/php_examen/index.php");


    }

    public function getEstudiante($query){

        $result = mysqli_query($this->con, $query);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }

    public function borrarEstudiante($query){

        $result = mysqli_query($this->con, $query);
        if(!$result){
            die("Query failed");
        }
        echo "<script>alert('Estudiante Eliminado')</script>";
        header("Location: http://localhost/php_examen/index.php");


    }

    // obtener Materias 
    public function getEstudiantes(){
        $sql = "SELECT * FROM $this->tablename";

        $result = mysqli_query($this->con, $sql);

        if(mysqli_num_rows($result) > 0){
            return $result;
        }
    }
    


}