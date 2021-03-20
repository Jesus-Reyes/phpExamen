<?php

require_once('../database/MateriasDB.php');
require_once('../components/card.php');

// create instancia DB
$database = new MateriasDB("Examen", "Materias");

?>

<?php include('../includes/header.php') ?>


<div class="container mt-5">
        <div class="row">
            <div class="col-md-7 mx-auto">
            
            <h3>Ingresar nombre del estudiante y Agregar Materias</h3>
            </div>
        </div>
    <div class="row mt-5">

        <div class="col-md-4 mx-auto">
            <div class="card card-body">

                <form action="save_task.php" method="POST">
                    <div class="form-group">

                        <input type="text" name="title" class="form-control" placeholder="Nombre del estudiante" autofocus>
                    </div>
                    <!-- * name = guardar_estudiante -->
                    <input type="submit" class="btn btn-success btn-block" name="save_task" value="Guardar Estudiante">

                </form>
            
            </div>
        </div>
        
    </div>

    <div class="row text-center py-5">
        <?php
            $materias = $database->getData();
            
            while($row = mysqli_fetch_assoc($materias)){
                card($row['id'], $row['materia_name'], $row['materia_image']);
            }
        
        
        ?>

    
    </div>

</div>

<?php include('../includes/footer.php') ?>