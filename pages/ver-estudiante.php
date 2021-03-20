<?php

require_once('../database/EstudiantesDB.php');


$databaseEstudiantes = new EstudiantesDB("EstudiantesDB", "Estudiantes");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM Estudiantes WHERE id = $id";

    $estudiante = $databaseEstudiantes->getEstudiante($query);
    
    $row = mysqli_fetch_array($estudiante);

}


?>


<?php include('../includes/header.php')?>



<div class="col-md-8 mx-auto">
<h3>Materias del Estudiante</h3>
    <div class="row">
        <table class="table table -bordered">
        <thead>
            <tr>
                <th><?php echo $row['name']  ?>:</th>
                <th><?php echo $row['Historia'] ?></th>
                <th><?php echo $row['Programacion'] ?></th>
                <th><?php echo $row['Matematicas'] ?></th>
                <th><?php echo $row['Calculo'] ?></th>

            </tr>


        </thead>
        
        </table>
        

    </div>

</div>


<?php include('../includes/footer.php')?>