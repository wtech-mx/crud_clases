
<?php
//start session
session_start();
include('../estilos.php');
//get session data
$sessData = !empty($_SESSION['sessData']) ? $_SESSION['sessData'] : '';

//get user data
if (!empty($_GET['id'])) {
    include '../DB.class.php';
    $db = new DB();
    $conditions['where'] = array(
        'id' => $_GET['id'],
    );
    $conditions['return_type'] = 'single';
    $userData = $db->getRows('facturacion', $conditions);
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
                    <h1> Facturación </h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="../../">Inicio</a></li>
                    <li class="breadcrumb-item active">Facturación</li>
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

<form method="post" action="userAction.php" class="form">
    <section class="form-intern" style="max-width:1120px; margin-top:0px; display:inline-block;">

        <div class="form-group row">
                <label class="col-sm-2 col-form-label">R.F.C.</label>
                <div class="col-sm-3">
                    <input type="text" class="form-control" name="rfc" value="<?php echo !empty($userData['rfc']) ? $userData['rfc'] : ''; ?>">
                </div>

                <label class="col-sm-2 col-form-label">Nombre o razón social: </label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" name="nombre_razon" value="<?php echo !empty($userData['nombre_razon']) ? $userData['nombre_razon'] : ''; ?>">
                </div>
        </div>
                            

        <div class="form-group row">
            <label class="col-sm-2 col-form-label">CURP</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="curp" value="<?php echo !empty($userData['curp']) ? $userData['curp'] : ''; ?>">
                </div>

                <label class="col-sm-2 col-form-label">Tax Id</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="tax_id" value="<?php echo !empty($userData['tax_id']) ? $userData['tax_id'] : ''; ?>">
                </div>

                <label class="col-sm-2 col-form-label">No. Licencia</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="no_licencia" value="<?php echo !empty($userData['no_licencia']) ? $userData['no_licencia'] : ''; ?>">
                </div>
        </div>                                                             

    </section>

    <section class="form-intern" style="max-width:1120px; margin-top:0px; display:inline-block;">
        <div class="row">

            <div class="col-6">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Correo</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="email" value="<?php echo !empty($userData['email']) ? $userData['email'] : ''; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Calle</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="calle" value="<?php echo !empty($userData['calle']) ? $userData['calle'] : ''; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Número Exterior:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="no_exterior" value="<?php echo !empty($userData['no_exterior']) ? $userData['no_exterior'] : ''; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Número Interior:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="no_interior" value="<?php echo !empty($userData['no_interior']) ? $userData['no_interior'] : ''; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">País</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="pais" value="<?php echo !empty($userData['pais']) ? $userData['pais'] : ''; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Código Postal:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="cp" value="<?php echo !empty($userData['cp']) ? $userData['cp'] : ''; ?>">
                    </div>
                </div>

            </div>

            <div class="col-6">

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Estado</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="estado" value="<?php echo !empty($userData['estado']) ? $userData['estado'] : ''; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Municipio</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="municipio" value="<?php echo !empty($userData['municipio']) ? $userData['municipio'] : ''; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Localidad</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="localidad" value="<?php echo !empty($userData['localidad']) ? $userData['localidad'] : ''; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Colonia:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="colonia" value="<?php echo !empty($userData['colonia']) ? $userData['colonia'] : ''; ?>">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Referencia</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="referencia" value="<?php echo !empty($userData['referencia']) ? $userData['referencia'] : ''; ?>">
                    </div>
                </div>

            </div>

        </div>

    </section>

    <input type="hidden" name="id" value="<?php echo !empty($userData['id']) ? $userData['id'] : ''; ?>">
    <input type="submit" name="userSubmit" class="btn btn-success" value="Guardar" />
    
</form>


</div>



</div>
