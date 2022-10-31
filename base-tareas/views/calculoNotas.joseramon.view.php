<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Trabajo notas</h1>

</div>

<!-- Content Row -->

<div class="row">

    <div class="col-12 col-lg-6">
        <?php
        if (isset($data['resultado']['modulos'])) {
        ?>
            <div class="alert alert-success card-body col-12">
                <div>
                    <h6>Resultado por modulos</h6>
                </div>

                <div>
                    <table class="table table-striped">
                        <thead>
                            <th>Módulo</th>
                            <th>Media</th>
                            <th>Examenes aprobados</th>
                            <th>Examenes suspensos</th>
                            <th>Asignaturas aprobados</th>
                            <th>Asinaturas suspensos</th>
                            <th>Máximo</th>
                            <th>Mínimo</th>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($data['resultado']['modulos'] as $nombreModulo => $datos) {
                            ?>
                                <tr>
                                    <td><?php echo ucfirst($nombreModulo); ?></td>
                                    <td><?php echo number_format($datos['media'], 2, ',', '.'); ?></td>
                                    <td><?php echo $datos['eAprobados']; ?></td>
                                    <td><?php echo $datos['eSuspensos']; ?></td>
                                    <td><?php echo $datos['aAprobados']; ?></td>
                                    <td><?php echo $datos['aSuspensos']; ?></td>
                                    <td><?php echo $datos['max']['alumno'] . ': ' . $datos['max']['nota']; ?></td>
                                    <td><?php echo $datos['min']['alumno'] . ': ' . $datos['min']['nota']; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <?php
                if (isset($data['resultado']['alumnos'])) {
                ?>
                    <div class="alert alert-success">
                        <h6>Alumnos con todo aprobado</h6>
                        <ul>
                            <?php
                            foreach ($data['resultado']['alumnos'] as $nAlum => $datos) {
                                if ($datos['suspensos'] === 0) {
                                    echo "<li>$nAlum</li>";
                                }
                            }
                            ?>
                        </ul>
                    </div>
                <?php
                }
                ?>
            </div>

            <div class="col-12 col-lg-6">
                <?php
                if (isset($data['resultado']['alumnos'])) {
                ?>
                    <div class="alert alert-warning">
                        <h6>Alumnos que suspendieron como mucho 1</h6>
                        <ul>
                            <?php
                            foreach ($data['resultado']['alumnos'] as $nAlum => $datos) {
                                if ($datos['suspensos'] === 1) {
                                    echo "<li>$nAlum</li>";
                                }
                            }
                            ?>
                        </ul>
                    </div>
                <?php
                }
                ?>
            </div>

            <div class="col-12 col-lg-6">
            <?php
                if (isset($data['resultado']['alumnos'])) {
                ?>
                    <div class="alert alert-primary">
                        <h6>Alumnos que promocionan</h6>
                        <ul>
                            <?php
                            foreach ($data['resultado']['alumnos'] as $nAlum => $datos) {
                                if ($datos['suspensos'] <= 1) {
                                    echo "<li>$nAlum</li>";
                                }
                            }
                            ?>
                        </ul>
                    </div>
                <?php
                }
                ?>

            </div>

            <div class="col-12 col-lg-6">
            <?php
                if (isset($data['resultado']['alumnos'])) {
                ?>
                    <div class="alert alert-danger">
                        <h6>Alumnos que no promocionan</h6>
                        <ul>
                            <?php
                            foreach ($data['resultado']['alumnos'] as $nAlum => $datos) {
                                if ($datos['suspensos'] > 1) {
                                    echo "<li>$nAlum</li>";
                                }
                            }
                            ?>
                        </ul>
                    </div>
                <?php
                }
                ?>

            </div>

        <?php
        }
        ?>
    </div>


    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Trabajo notas</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <!--<form action="./?sec=formulario" method="post">                   -->
                <form method="post" action="./?sec=calculoNotas.joseramon">

                    <input type="hidden" name="sec" value="formulario" />
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1">Exemplo textarea</label>
                        <textarea class="form-control" id="datos" name="datos" rows="10"></textarea>
                        <p class="text-danger small"><?php echo isset($data['errores']['datos']) ? $data['errores']['datos'] : ''; ?></p>
                    </div>

                    <div class="mb-3">
                        <input type="submit" value="Enviar" name="enviar" class="btn btn-primary" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>