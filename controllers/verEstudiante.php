<?php

require_once('./database/EstudiantesDB.php');

$databaseEstudiantes = new EstudiantesDB("EstudiantesDB", "Estudiantes");

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "SELECT * FROM Estudiantes WHERE id = $id";

    $estudiante = $databaseEstudiantes->getEstudiante($query);
    

}


?>