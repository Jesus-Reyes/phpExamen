<?php

require_once('../database/EstudiantesDB.php');

// create instancia DB
$databaseEstudiantes = new EstudiantesDB("EstudiantesDB", "Estudiantes");

if(isset($_POST['save_estudiante'])){
    //! (AQUI OBTENGO EL NOMBRE )
    $estudiante = array(
        'name' =>  '', 
        'Historia' =>  '', 
        'Programacion' =>  '', 
        'Matematicas' =>  '', 
        'Calculo' =>  '', 
        
    );
    $name = $_POST['nombre'];

    $estudiante['name'] = $name;
    
    $materias = $databaseMaterias->getData();
    while($row = mysqli_fetch_assoc($materias)){
        
        foreach($_SESSION['materia'] as $key => $value){

            if($value['id_materia'] == $row['id'] ){
                //! GUARDAR MATERIAS (AQUI ESTAN LAS MATERIAS AGREGADAS)
                // echo $row['materia_name'];
                $estudiante[$row['materia_name']] = $row['materia_name'];
                
            }
    
        }
    }

    $nombre = $estudiante['name'];
    $historia = $estudiante['Historia'];
    $programacion = $estudiante['Programacion'];
    $matematicas = $estudiante['Matematicas'];
    $calculo = $estudiante['Calculo'];

    $query = "INSERT INTO Estudiantes(name, Matematicas, Historia, Programacion, Calculo) VALUES ('$nombre', '$historia', '$programacion', '$matematicas', '$calculo')";

    
    $databaseEstudiantes->setEstudiante($query); 

}



?>