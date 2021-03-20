<?php
session_start();
require_once('../database/MateriasDB.php');
require_once('../components/card.php');
require_once('../components/cardMateriaAgregada.php');

// create instancia DB
$databaseMaterias = new MateriasDB("MateriasDB", "Materias");


if(isset($_POST['remove'])){
    
    
    if($_GET['action'] == 'remove'){
        foreach($_SESSION['materia'] as $key => $value){

            if($value['id_materia'] == $_GET['id']){

                unset($_SESSION['materia'][$key]);
                echo "<script>alert('La materia fue removida...!')</script>";
                echo "<script>window.location = 'http://localhost/php_examen/pages/add-estudiante.php'</script>";
            }

        }
    }

}

?>

<?php include("../controllers/agregarMateria.php");?>
<?php include("../controllers/guardarEstudiante.php");?>

<?php include('../includes/header.php');?>


<div class="container mt-5">
        <div class="row">
            <div class="col-md-7 mx-auto">
            
            <h3>Ingresar nombre del estudiante y Agregar Materias</h3>
            </div>
        </div>
    <div class="row mt-5">

        <div class="col-md-3 mx-auto">
            <div class="card card-body">

                <form action="http://localhost/php_examen/pages/add-estudiante.php" method="POST">
                    <div class="form-group">

                        <input type="text" name="nombre" class="form-control" placeholder="Nombre del estudiante" autofocus>
                    </div>
                    <!-- * name = guardar_estudiante -->
                    <input type="submit" class="btn btn-success btn-block" name="save_estudiante" value="Guardar Estudiante">

                </form>
            
            </div>
        </div>

        <!-- !LLamar a otro componente Materias  agregadas -->
        <div class="col-md-8">
            
                <?php
                    if(isset($_SESSION['materia'])){
                        $materia_id = array_column($_SESSION['materia'], 'id_materia');
                    
                        $materias = $databaseMaterias->getData();
                    

                         while($row = mysqli_fetch_assoc($materias)){
                            
                            foreach($materia_id as $id){

                                if($row['id'] == $id){
                                    cartElement($row['materia_image'], $row['materia_name'], $row['id']);
                                 }
                            }
                        }
                    }else{
                        echo "<h3>No hay materias</h3>";
                    }

                ?>    
        </div>
    </div>

    <div class="row text-center py-5">
        <?php
            $materias = $databaseMaterias->getData();
            
            while($row = mysqli_fetch_assoc($materias)){
                card($row['id'], $row['materia_name'], $row['materia_image']);
            }
        ?>
    </div>

</div>

<?php include('../includes/footer.php') ?>