<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "DELETE FROM Estudiantes WHERE id = $id";

    $databaseEstudiantes->borrarEstudiante($query);
    

}


?>