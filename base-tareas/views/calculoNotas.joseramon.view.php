<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Trabajo notas</h1>

</div>

<!-- Content Row -->

<div class="row">

    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Trabajo notas</h6>
            </div>
            <!-- Card Body -->
            <div class="card-body">
                <!--<form action="./?sec=formulario" method="post">                   -->
                <form method="post" action="./?sec=calculoNotas.joseramon">
                    <?php
                    if (isset($data['resultado']['modulos'])) {
                    ?>
                        <div class="alert alert-success">


                            <div>
                                <h6>Resultado por modulos</h6>
                            </div>

                            <div>
                                <table>
                                    <thead>
                                        <th>Módulo</th>
                                        <th>Media</th>
                                        <th>Aprobados</th>
                                        <th>Suspensos</th>
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
                                                <td><?php echo $datos['aprobados']; ?></td>
                                                <td><?php echo $datos['suspensos']; ?></td>
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
                    <?php
                    }
                    ?>
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