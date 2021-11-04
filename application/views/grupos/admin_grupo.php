<script src="<?php echo base_url(); ?>js/admin_grupo.js"></script>

<div class="container-fluid mt-2">
    <h2>Administrar grupo</h2>
    <hr>

    <p><strong>Materia: </strong><?php echo $data_grupo->materia; ?></p>
    <p><strong>Profesor: </strong><?php echo $data_grupo->nombre . " " . $data_grupo->apellido; ?></p>
    <p><strong>Grupo: </strong><?php echo $data_grupo->num_grupo; ?></p>
    <p><strong>Año: </strong><?php echo $data_grupo->anio; ?></p>
    <p><strong>Ciclo: </strong><?php echo $data_grupo->ciclo; ?></p>
    <input type="hidden" id="idgrupo" value="<?= $data_grupo->idgrupo; ?>" />

    <div class="row">
        <div class="col-sm-1" >
            <strong>Estudiante:</strong>
        </div>
        <div class="col-sm-3">
            <select class="form-control" id="estudiante" style="width: auto !important">
                <option>[Seleccione una opcion]</option>
                <?php foreach ($estudiantes as $item) : ?>
                    <option value="<?= $item->idestudiante ?>">
                        <?= $item->nombre . " " . $item->apellido ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-sm-4">
        <button class="btn btn-primary" type="submit" onclick="agregarEstudiante()">
            Agregar  a la lista 
        </button>
        </div>
    </div>
</div>
<br>

<div class="col-8">
    <form action="<?= site_url("gruposController"); ?>/postAdminAlumnos" method="POST" class="form-ajax">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Código</th>
                    <th>Estudiantes</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="contenido_tabla"></tbody>
        </table>
        <br>
        <!-- Aqui se agrega toda la informacion que se enviará 
        Debe estar oculta porque solo interesa que se envie y que no se ve -->
        <div id="data" hidden></div>
        <div>
            <button class="btn btn-success">Guardar</button>
            <a class="btn btn-info" href="<?= site_url('GruposController/report_todos_los_inscritos/' . $data_grupo->idgrupo) ?>">Reporte en PDF</a>
            <a class="btn btn-secondary" href="<?= site_url('GruposController') ?>">Volver</a>            
        </div>
    </form>
</div>
<script>
    // Se cargar los estudiantes previamente agregados
    // Esto con el objetico de manipular la información
    // en formato de objetos JSON
    estudiantes = <?= json_encode($grupo_estudiantes) ?>;
    // Mostrando estudiantes
    mostrarEstudiantes();
</script>