<?php
$data['resultado'] = [];

if (isset($_POST['enviar'])) {
    $data['errores'] = checkForm($_POST);
}


function checkForm($datos) : array
{
    $errores = [];
    if (empty($datos['datos'])) {
        $errores['datos'] = "Este campo es obligatorio";
    } else {
        $modulos = json_decode($datos['datos'], true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            $errores['datos'] = "El formato no es correcto";
        } else {
            $erroresJson = "";
            foreach ($modulos as $modulo => $alumnos) {
                var_dump($modulo);
                if (empty($modulo)) {
                    $erroresJson .= "El nombre del módulo no puede estar vacio<br/>";
                }
                if(empty($modulos[$modulo])){
                    $erroresJson .= "El modulo ".htmlentities($modulo)." esta vacio";
                }
                if (!is_array($alumnos)) {
                    $erroresJson .= "El módulo " . htmlentities($modulo) . " no tiene un array de alumnos<br/>";
                } else {
                    foreach ($alumnos as $nombre => $nota) {
                        if (empty($nombre)) {
                            $erroresJson .= "El módulo " . htmlentities($modulo) . " tiene un alumno sin nombre<br/>";
                        }
                        if(empty($nota)){
                            $erroresJson .= "El módulo " . htmlentities($modulo) . " tiene un alumno ".htmlentities($nombre)." que no tiene notas<br/>";
                        }else{
                            foreach ($nota as $notas => $valor) {
                                if ($valor > 10 || $valor < 0) {
                                    $erroresJson .= "Módulo ".htmlentities($modulo). ", almuno ".htmlentities($nombre). " tiene una de $valor que no es valida<br/>";
                                }
                            }
                        }
                    }
                }
            }
            !empty($erroresJson) ? $errores['datos'] = $erroresJson : '';
        }
    }
    return $errores;
}

include 'views/templates/header.php';
include 'views/calculoNotas.joseramon.view.php';
include 'views/templates/footer.php';
