<?php

require_once('./database/EstudiantesDB.php');


// create instancia DB
$databaseEstudiantes = new EstudiantesDB("EstudiantesDB", "Estudiantes");

?>

<?php include("./controllers/borrarEstudiante.php");?>
<?php include('includes/header.php') ?>

<div class="container">
    <div class="row">

        <div class="col-3  my-auto">
            <form action="./pages/add-estudiante.php">
                <button class="btn btn-primary mt-5" >
                    Agregar estudiante
                </button>
            </form>
        </div>
        <!--* Listado de estudiantes -->
        
        <div class="col-md-9">

            <table class="table table-bordered">
                <thead>
                    <tr>Nombre del estudiante</tr>

                </thead>

                <tbody>
                    <?php
                        $estudiantes = $databaseEstudiantes->getEstudiantes();

                        while($row = mysqli_fetch_array($estudiantes)){ ?>

                            <tr>
                                <td>  <?php echo $row['name'] ?></td>
                                <td>
                                    <a href="./pages/edit-estudiante.php?id=<?php echo $row['id']?>" class="btn btn-secondary">
                                        <i class="fas fa-marker"></i>
                                    </a>
                                    <a href="index.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                    <a href="./pages/ver-estudiante.php?id=<?php echo $row['id']?>" class="btn btn-danger">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                
                                </td>
                            </tr>

                    <?php } ?>
                
                </tbody>
            
            </table>

        </div>
    </div>

</div>

<?php include('includes/footer.php') ?>