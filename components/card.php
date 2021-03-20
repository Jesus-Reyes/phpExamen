<?php

function card($idMateria, $materia_name, $materia_image){

    //TODO: checar el metodo y hacia a donde los vamos a enviar 

    $cardElemen = "
    
    <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
        <form action=\"card.php\" method=\"post\">
            <div class=\"card shadow\">
                <div>
                    <img src=\"$materia_image\" alt=\"Image1\" class=\"img-fluid card-img-top\">
                    
                </div>
                <div class=\"card-body\">
                    <h5 class=\"card-title\">$materia_name</h5>
                    
                    <button type=\"submit\" class=\"btn btn-warning my-3\" name=\"add\">Agregar Materia <i class=\"fas fa-shopping-cart\"></i></button>
                        <input type='hidden' name='id_materia' value='$idMateria'>
                </div>
            </div>
        </form>
    </div>
    
    ";

    echo $cardElemen;

}







?>