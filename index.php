<?php

require_once('./database/EstudiantesDB.php');


// create instancia DB
$databaseEstudiantes = new EstudiantesDB("Examenen", "Estudiantes");

?>
<!-- Traer a los estudiantes de otra base de datos -->

<?php include('includes/header.php') ?>

<div class="container">
    <div class="row">

        <div class="col-3  my-auto">
            <form action="./pages/addEstudiante.php">
                <button class="btn btn-primary mt-5" >
                    Agregar estudiante
                </button>
            </form>
        </div>
        <!--* Listado de estudiantes -->
        <div class="col-9">

            <?php
                $estudiantes = $databaseEstudiantes->getEstudiantes();

                echo mysqli_num_rows($estudiantes);
                
            
            ?>

        </div>
    </div>

</div>

<?php include('includes/footer.php') ?>