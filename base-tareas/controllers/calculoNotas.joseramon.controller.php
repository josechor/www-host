<?php
declare(strict_types=1);
$data['resultado'] = [];

if (isset($_POST['enviar'])) {
    $data['errores'] = checkForm($_POST);
    $data['input'] = filter_var_array($_POST);
    var_dump(count($data['errores']));
    if (count($data['errores']) === 0) {
        $jsonArray = json_decode($_POST['datos'], true);
        $data['resultado'] = datosAsig($jsonArray);
    }
}


function datosAsig($jsonArray): array
{
    $resultado = [];
    $alumnos = [];

    foreach ($jsonArray as $materia => $notas) {
        $resultado[$materia] = [];
        $suspensos = 0;
        $aprobados = 0;
        $max = [
            'alumno' => '',
            'nota' => -1
        ];
        $min = [
            'alumno' => '',
            'nota' => 11
        ];
        $notaAcumulada = 0;
        $contarAlumnos = 0;
        $cantidadNotas = 0;

        foreach ($notas as $alumno => $todasNotas) {
            if(!isset($alumnos[$alumno])){
                $alumnos[$alumno] = ['aprobados' => 0, 'suspensos' => 0];
            }
            $contarAlumnos++;
            foreach ($todasNotas as $n => $valorNota) {
                $cantidadNotas++;
                $notaAcumulada += $valorNota;

                if($valorNota < 5){
                    $suspensos++;
                    $alumnos[$alumno]['suspensos']++;
                }else{
                    $aprobados++;
                    $alumnos[$alumno]['aprobados']++;
                }

                if($valorNota > $max['nota']){
                    $max['alumno'] = $alumno;
                    $max['nota'] = $valorNota;
                }
                if($valorNota < $min['nota']){
                    $min['alumno'] = $alumno;
                    $min['nota'] = $valorNota;
                }
            }
        }
        
        $resultado[$materia]['media'] = $notaAcumulada/$cantidadNotas;
        $resultado[$materia]['max'] = $max;
        $resultado[$materia]['min'] = $min;
        $resultado[$materia]['suspensos'] = $suspensos;
        $resultado[$materia]['aprobados'] = $aprobados;
    }
    return array('modulos' => $resultado, 'alumnos' => $alumnos);
}

function checkForm($datos): array
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
                if (empty($modulos[$modulo])) {
                    $erroresJson .= "El modulo " . htmlentities($modulo) . " esta vacio";
                }
                if (!is_array($alumnos)) {
                    $erroresJson .= "El módulo " . htmlentities($modulo) . " no tiene un array de alumnos<br/>";
                } else {
                    foreach ($alumnos as $nombre => $nota) {
                        if (empty($nombre)) {
                            $erroresJson .= "El módulo " . htmlentities($modulo) . " tiene un alumno sin nombre<br/>";
                        }
                        if (empty($nota)) {
                            $erroresJson .= "El módulo " . htmlentities($modulo) . " tiene un alumno " . htmlentities($nombre) . " que no tiene notas<br/>";
                        } else {
                            foreach ($nota as $notas => $valor) {
                                if ($valor > 10 || $valor < 0) {
                                    $erroresJson .= "Módulo " . htmlentities($modulo) . ", almuno " . htmlentities($nombre) . " tiene una de $valor que no es valida<br/>";
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
