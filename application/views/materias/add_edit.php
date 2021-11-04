<?php if ($this->session->flashdata('success')) : ?>
    <p class="success"><strong><?php echo $this->session->flashdata('success'); ?></strong></p>
<?php endif; ?>
<?php if ($this->session->flashdata('error')) : ?>
    <p class="error"><strong><?php echo $this->session->flashdata('error'); ?></strong></p>
<?php endif; ?>


<div class="container-fluid mt-2">
    <div class="ml-md-4 mr-md-4">
        <div class="title">
            <div class="col-4">
                <h3><?php echo isset($materia) ? "Modificar" : "Agregar"; ?></h3>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">

    <div class="ml-md-4 mr-md-4">
        <div class="row">
            <div class="offset-md-2 col-md-4 col-sm-12">
                <form action="<?= site_url("MateriasController"); ?>/<?= isset($materia) ? "update" : 'add'; ?>" method="POST" class="form-ajax">

                    <div class="form">
                        <div class="form-group">
                            <input class="form-control" type="hidden" name="PK_materia" value="<?= isset($materia) ? $materia->idmateria : ""; ?>">
                        </div>

                        <div class="form-group">
                            <?php if (!isset($materia->idmateria)) { ?>
                                <label>Id Materia:</label>
                                <input class="form-control" type="text" name="idmateria" value="<?= isset($materia) ? $materia->idmateria : ""; ?>">
                            <?php } else { ?>
                                <label>Id Materia:</label>
                                <input readonly class="form-control" type="text" name="idmateria" value="<?= isset($materia) ? $materia->idmateria : ""; ?>">
                            <?php } ?>
                        </div>

                        <div class="form-group">
                            <label>Materia:</label>
                            <input class="form-control" type="text" name="materia" value="<?= isset($materia) ? $materia->materia : ""; ?>">
                        </div>
                        <br>
                        <div class="form-group">
                            <input class="btn btn-success" type="submit" value="Guardar"> <a class='btn btn-secondary' href="<?= site_url('MateriasController') ?>">Volver</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function func_exito(data, textStatus, xhr, form) {
        alert(data.msg);
        window.location.href = "<?= site_url('MateriasController') ?>";
    }
</script>