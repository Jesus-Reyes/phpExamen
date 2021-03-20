<?php
    function cartElement($materia_image, $materia_name, $idMateria){
        $element = "
        
        <form action=\"http://localhost/php_examen/pages/add-estudiante.php?action=remove&id=$idMateria\" method=\"post\" class=\"cart-items\">
                        <div class=\"border rounded\">
                            <div class=\"row bg-white\">
                                <div class=\"col-md-3 pl-0\">
                                    <img src=$materia_image alt=\"Image1\" class=\"img-fluid\">
                                </div>
                                <div class=\"col-md-3\">
                                    <h5 class=\"pt-2\">$materia_name</h5>
                                    <button type=\"submit\" class=\"btn btn-danger mx-2\" name=\"remove\">Remove</button>
                                </div>
                                
                            </div>
                        </div>
        </form>
        
        ";
        
        echo  $element;
    }

?>