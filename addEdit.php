
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

<style>
    .form-intern {
    width: 98%;
    height: auto;
    padding: 20px 15px;
    display: block;
    margin: 10px;
    background-color: #d0e5e9;
    border: 1px solid #075D9E;
    display: inline-block;
    overflow: auto;
}
sectionCampos.Col2 {
    padding-top: 0px;
    min-height: 50px;
    padding-bottom: 5px;
}
.sectionCampos {
    width: 48%;
    float: left;
    min-height: 80px;
    padding: 1%;
}
</style>

<section id="cuerpo-container-app">         
        <section class="content-header navbar-light">
            <div class="container-fluid">
                <div class="row mb-2">
                    
                <div class="col-sm-6"> 
                    <h1> Transporte </h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="../../">Inicio</a></li>
                    <li class="breadcrumb-item active">Transporte</li>
                    </ol>
                </div>

            </div>
            </div>
</section> 

<div class="container">
    <?php if (!empty($statusMsg) && ($statusMsgType == 'success')) { ?>
        <div class="alert alert-success"><?php echo $statusMsg; ?></div>
    <?php } elseif (!empty($statusMsg) && ($statusMsgType == 'error')) { ?>
        <div class="alert alert-danger"><?php echo $statusMsg; ?></div>
    <?php } ?>

<div class="row">

            <section class="form-intern" style="max-width:1120px; margin-top:0px; display:inline-block;">

                <form method="post" action="userAction.php" class="form">


                    <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Placa</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="placa" value="<?php echo !empty($userData['placa']) ? $userData['placa'] : ''; ?>">
                            </div>

                            <label class="col-sm-2 col-form-label">Año</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="anio" value="<?php echo !empty($userData['anio']) ? $userData['anio'] : ''; ?>">
                            </div>

                            <label class="col-sm-2 col-form-label">Tipo</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="tipo" value="<?php echo !empty($userData['tipo']) ? $userData['tipo'] : ''; ?>">
                            </div>
                    </div>
                                        

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Permiso SCT</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="permisosct" value="<?php echo !empty($userData['permisosct']) ? $userData['permisosct'] : ''; ?>">
                            </div>

                            <label class="col-sm-2 col-form-label">Numero Permiso SCT</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="numeropermisosct" value="<?php echo !empty($userData['numeropermisosct']) ? $userData['numeropermisosct'] : ''; ?>">
                            </div>

                            <label class="col-sm-2 col-form-label">Nombrea Seguradora Responsabilidad Civil</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="nombreaseguradoraresponsabilidadcivil" value="<?php echo !empty($userData['nombreaseguradoraresponsabilidadcivil']) ? $userData['nombreaseguradoraresponsabilidadcivil'] : ''; ?>">
                            </div>
                    </div>
                                        

                    <div class="form-group  row">
                        <label class="col-sm-2 col-form-label">Numero Poliza Responsabilidad Civil</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="numeropolizaresponsabilidadcivil" value="<?php echo !empty($userData['numeropolizaresponsabilidadcivil']) ? $userData['numeropolizaresponsabilidadcivil'] : ''; ?>">
                            </div>

                            <label class="col-sm-2 col-form-label">Nombrea Seguradora Carga</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="nombreaseguradoracarga" value="<?php echo !empty($userData['nombreaseguradoracarga']) ? $userData['nombreaseguradoracarga'] : ''; ?>">
                            </div>

                            <label class="col-sm-2 col-form-label">Numero Poliza Carga</label>
                            <div class="col-sm-2">
                                <input type="text" class="form-control" name="numeropolizacarga" value="<?php echo !empty($userData['numeropolizacarga']) ? $userData['numeropolizacarga'] : ''; ?>">
                            </div>

                    </div>
                                 

                    <div class="form-group  row">
                        <label class="col-sm-2 col-form-label">Numero Poliza Carga</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="numeropolizacarga" value="<?php echo !empty($userData['numeropolizacarga']) ? $userData['numeropolizacarga'] : ''; ?>">
                            </div>

                            <label class="col-sm-2 col-form-label">Nombre Aseguradora Medio Ambiente</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="nombreaseguradoramedioambiente" value="<?php echo !empty($userData['nombreaseguradoramedioambiente']) ? $userData['nombreaseguradoramedioambiente'] : ''; ?>">
                            </div>

                    </div>
                                        
                    
                    <div class="form-group  row">
                    <label class="col-sm-2 col-form-label">Numero Poliza Medio Ambiente</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="numeropolizamedioambiente" value="<?php echo !empty($userData['numeropolizamedioambiente']) ? $userData['numeropolizamedioambiente'] : ''; ?>">
                            </div>
                            
                        <label class="col-sm-2 col-form-label">Prima Seguro</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" name="primaseguro" value="<?php echo !empty($userData['primaseguro']) ? $userData['primaseguro'] : ''; ?>">
                            </div>
                    </div>
                    

                    <input type="hidden" name="id" value="<?php echo !empty($userData['id']) ? $userData['id'] : ''; ?>">
                    <input type="submit" name="userSubmit" class="btn btn-success" value="Guardar" />
                    
                </form>
            </section>


        </div>
