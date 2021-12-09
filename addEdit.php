
<?php
//start session
session_start();
include('./estilos.php');
//get session data
$sessData = !empty($_SESSION['sessData']) ? $_SESSION['sessData'] : '';

//get user data
if (!empty($_GET['id'])) {
    include 'DB.class.php';
    $db = new DB();
    $conditions['where'] = array(
        'id' => $_GET['id'],
    );
    $conditions['return_type'] = 'single';
    $userData = $db->getRows('cporte_tvehiculos', $conditions);
}

$actionLabel = !empty($_GET['id']) ? 'Edit' : 'Add';

//get status message from session
if (!empty($sessData['status']['msg'])) {
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>

<div class="container">
    <?php if (!empty($statusMsg) && ($statusMsgType == 'success')) { ?>
        <div class="alert alert-success"><?php echo $statusMsg; ?></div>
    <?php } elseif (!empty($statusMsg) && ($statusMsgType == 'error')) { ?>
        <div class="alert alert-danger"><?php echo $statusMsg; ?></div>
    <?php } ?>
    <div class="row">
        <div class="panel panel-default users-content">
            <div class="panel-heading"><?php echo $actionLabel; ?> User <a href="index.php" class="glyphicon glyphicon-arrow-left"></a></div>
            <div class="panel-body">
                <form method="post" action="userAction.php" class="form">
                    <div class="form-group">
                        <label>Placa</label>
                        <input type="text" class="form-control" name="placa" value="<?php echo !empty($userData['placa']) ? $userData['placa'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label>Año</label>
                        <input type="text" class="form-control" name="anio" value="<?php echo !empty($userData['anio']) ? $userData['anio'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label>Tipo</label>
                        <input type="text" class="form-control" name="tipo" value="<?php echo !empty($userData['tipo']) ? $userData['tipo'] : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label>Permiso SCT</label>
                        <input type="text" class="form-control" name="permisosct" value="<?php echo !empty($userData['permisosct']) ? $userData['permisosct'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label>Numero Permiso SCT</label>
                        <input type="text" class="form-control" name="numeropermisosct" value="<?php echo !empty($userData['numeropermisosct']) ? $userData['numeropermisosct'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label>Nombrea Seguradora Responsabilidad Civil</label>
                        <input type="text" class="form-control" name="nombreaseguradoraresponsabilidadcivil" value="<?php echo !empty($userData['nombreaseguradoraresponsabilidadcivil']) ? $userData['nombreaseguradoraresponsabilidadcivil'] : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label>Numero Poliza Responsabilidad Civil</label>
                        <input type="text" class="form-control" name="numeropolizaresponsabilidadcivil" value="<?php echo !empty($userData['numeropolizaresponsabilidadcivil']) ? $userData['numeropolizaresponsabilidadcivil'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label>Nombrea Seguradora Carga</label>
                        <input type="text" class="form-control" name="nombreaseguradoracarga" value="<?php echo !empty($userData['nombreaseguradoracarga']) ? $userData['nombreaseguradoracarga'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label>Numero Poliza Carga</label>
                        <input type="text" class="form-control" name="numeropolizacarga" value="<?php echo !empty($userData['numeropolizacarga']) ? $userData['numeropolizacarga'] : ''; ?>">
                    </div>

                    <div class="form-group">
                        <label>Nombre Aseguradora Medio Ambiente</label>
                        <input type="text" class="form-control" name="nombreaseguradoramedioambiente" value="<?php echo !empty($userData['nombreaseguradoramedioambiente']) ? $userData['nombreaseguradoramedioambiente'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label>Numero Poliza Medio Ambiente</label>
                        <input type="text" class="form-control" name="numeropolizamedioambiente" value="<?php echo !empty($userData['numeropolizamedioambiente']) ? $userData['numeropolizamedioambiente'] : ''; ?>">
                    </div>
                    <div class="form-group">
                        <label>Prima Seguro</label>
                        <input type="text" class="form-control" name="primaseguro" value="<?php echo !empty($userData['primaseguro']) ? $userData['primaseguro'] : ''; ?>">
                    </div>

                    <input type="hidden" name="id" value="<?php echo !empty($userData['id']) ? $userData['id'] : ''; ?>">
                    <input type="submit" name="userSubmit" class="btn btn-success" value="SUBMIT" />
                </form>
            </div>
        </div>
    </div>
</div>