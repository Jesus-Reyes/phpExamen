<?php

    if(isset($_POST['add'])){
        // print_r($_POST['id_materia']);

        // echo $_POST['id_materia'];

        if(isset($_SESSION['materia'])){

            $item_array_id = array_column($_SESSION['materia'], "id_materia");
            if(in_array($_POST['id_materia'], $item_array_id  )){

                echo "<script>alert('La materia ya esta agregada!')</script>";
                echo "<script>window.location = 'http://localhost/php_examen/pages/addEstudiante.php'</script>";
            }else{

                $numberElements = count($_SESSION['materia']);
                $item_array = array(
                    'id_materia' => $_POST['id_materia']
                );

                $_SESSION['materia'][$numberElements] = $item_array;
                print_r($_SESSION['materia']);



            }

        }else{

            $item_array = array(
                'id_materia' => $_POST['id_materia']
            );

            // crear nueva variable de sesion 
            $_SESSION['materia'][0] = $item_array;
            print_r($_SESSION['materia']);

        }



    }


?>