
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
.btn_gris{
    background-color: #075D9E;
    color: white;
    font-size: 1.2em;
    padding: 5px 20px;
    height: 40px;
    display: inline-block;
    border: none;
    box-shadow:none;
    margin: 10px;
}
.btn_gris:hover{
    background-color: #07ACC9;
    cursor: pointer;
    color: white;
}
.field-validation-error {
    color: #e74c3c;
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
                            <label class="col-sm-1 col-form-label" for="placa">Placa</label>
                            <div class="col-2">
                                <input class="form-control" data-val="true" data-val-regex="El formato es inválido corrija y vuelva a intentarlo" data-val-regex-pattern="[^(?!.*\s)-]{6,7}" id="placa" name="placa" type="text" value="<?php echo !empty($userData['placa']) ? $userData['placa'] : ''; ?>" />
								<span class="field-validation-valid" data-valmsg-for="placa" data-valmsg-replace="true"></span>
                            </div>

                            <label class="col-sm-1 col-form-label">Año</label>
                            <div class="col-sm-2">
                                <input class="form-control" data-val="true" data-val-regex="El formato es inválido corrija y vuelva a intentarlo" data-val-regex-pattern="(19[0-9]{2}|20[0-9]{2})" id="anio" name="anio" type="text" value="<?php echo !empty($userData['anio']) ? $userData['anio'] : ''; ?>" />
								<span class="field-validation-valid" data-valmsg-for="anio" data-valmsg-replace="true"></span>
                            </div>

							<label class="col-sm-2 col-form-label">Tipo</label>
							<div class="col-sm-4">
									<select class="form-control" id="tipo" name="tipo">
                                        <option value="<?php echo !empty($userData['tipo']) ? $userData['tipo'] : ''; ?>">Seleccione una opción</option>
										<option value="C2">Cami&#243;n Unitario (2 llantas en el eje delantero y 4 llantas en el eje trasero)</option>
										<option value="C3">Cami&#243;n Unitario (2 llantas en el eje delantero y 6 o 8 llantas en los dos ejes traseros)</option>
										<option value="C3R3">Cami&#243;n-Remolque (10 llantas en el cami&#243;n y 12 llantas en remolque)</option>
										<option value="C3R2">Cami&#243;n-Remolque (10 llantas en el cami&#243;n y 8 llantas en remolque)</option>
										<option value="C2R3">Cami&#243;n-Remolque (6 llantas en el cami&#243;n y 12 llantas en remolque)</option>
										<option value="C2R2">Cami&#243;n-Remolque (6 llantas en el cami&#243;n y 8 llantas en remolque)</option>
										<option value="OTROEVGP">Especializado de carga Voluminosa y/o Gran Peso</option>
										<option value="GPLATA">Gr&#250;a de Plataforma Tipo A</option>
										<option value="GPLATB">Gr&#250;a de Plataforma Tipo B</option>
										<option value="GPLATC">Gr&#250;a de Plataforma Tipo C</option>
										<option value="GPLATD">Gr&#250;a de Plataforma Tipo D</option>
										<option value="GPLUTA">Gr&#250;a de Pluma Tipo A</option>
										<option value="GPLUTB">Gr&#250;a de Pluma Tipo B</option>
										<option value="GPLUTC">Gr&#250;a de Pluma Tipo C</option>
										<option value="GPLUTD">Gr&#250;a de Pluma Tipo D</option>
										<option value="OTROSG">Servicio de Gr&#250;as</option>
										<option value="T3S3">Tractocami&#243;n Articulado (10 llantas en el tractocami&#243;n, 12 llantas en el semirremolque)</option>
										<option value="T3S1">Tractocami&#243;n Articulado (10 llantas en el tractocami&#243;n, 4 llantas en el semirremolque)</option>
										<option value="T3S2">Tractocami&#243;n Articulado (10 llantas en el tractocami&#243;n, 8 llantas en el semirremolque)</option>
										<option value="T2S3">Tractocami&#243;n Articulado (6 llantas en el tractocami&#243;n, 12 llantas en el semirremolque)</option>
										<option value="T2S1">Tractocami&#243;n Articulado (6 llantas en el tractocami&#243;n, 4 llantas en el semirremolque)</option>
										<option value="T2S2">Tractocami&#243;n Articulado (6 llantas en el tractocami&#243;n, 8 llantas en el semirremolque)</option>
										<option value="T3S1R3">Tractocami&#243;n Semirremolque-Remolque (10 llantas en el tractocami&#243;n, 4 llantas en el semirremolque y 12 llantas en el remolque)</option>
										<option value="T3S1R2">Tractocami&#243;n Semirremolque-Remolque (10 llantas en el tractocami&#243;n, 4 llantas en el semirremolque y 8 llantas en el remolque)</option>
										<option value="T3S2R3">Tractocami&#243;n Semirremolque-Remolque (10 llantas en el tractocami&#243;n, 8 llantas en el semirremolque y 12 llantas en el remolque)</option>
										<option value="T3S2R4">Tractocami&#243;n Semirremolque-Remolque (10 llantas en el tractocami&#243;n, 8 llantas en el semirremolque y 16 llantas en el remolque)</option>
										<option value="T3S2R2">Tractocami&#243;n Semirremolque-Remolque (10 llantas en el tractocami&#243;n, 8 llantas en el semirremolque y 8 llantas en el remolque)</option>
										<option value="T2S1R3">Tractocami&#243;n Semirremolque-Remolque (6 llantas en el tractocami&#243;n, 4 llantas en el semirremolque y 12 llantas en el remolque)</option>
										<option value="T2S1R2">Tractocami&#243;n Semirremolque-Remolque (6 llantas en el tractocami&#243;n, 4 llantas en el semirremolque y 8 llantas en el remolque)</option>
										<option value="T2S2R2">Tractocami&#243;n Semirremolque-Remolque (6 llantas en el tractocami&#243;n, 8 llantas en el semirremolque y 8 llantas en el remolque)</option>
										<option value="T3S3S2">Tractocami&#243;n Semirremolque-Semirremolque (10 llantas en el tractocami&#243;n, 12 llantas en el semirremolque delantero y 8 llantas en el semirremolque trasero)</option>
										<option value="T3S2S2">Tractocami&#243;n Semirremolque-Semirremolque (10 llantas en el tractocami&#243;n, 8 llantas en el semirremolque delantero y 8 llantas en el semirremolque trasero)</option>
										<option value="T2S2S2">Tractocami&#243;n Semirremolque-Semirremolque (6 llantas en el tractocami&#243;n, 8 llantas en el semirremolque delantero y 8 llantas en el semirremolque trasero)</option>
										<option value="VL">Veh&#237;culo ligero de carga (2 llantas en el eje delantero y 2 llantas en el eje trasero)</option>
									</select>
							</div>
                    </div>
                                        

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Permiso SCT</label>
                            <div class="col-sm-2">
                            <select class="form-control" id="permisosct" name="permisosct">
                                    <option value="value="<?php echo !empty($userData['permisosct']) ? $userData['permisosct'] : ''; ?>"">Selecciona una opción</option>
                                    <option value="TPXX00">Permiso no contemplado en el cat&#225;logo.</option>
									<option value="TPAF20">Autotransporte Federal de Carga Especializada de fondos y valores.</option>
									<option value="TPAF03">Autotransporte Federal de Carga Especializada de materiales y residuos peligrosos.</option>
							</select>
                            </div>

                            <label class="col-sm-2 col-form-label">Numero Permiso SCT</label>
                            <div class="col-sm-2">
                                <input class="form-control" data-val="true" data-val-regex="Alfanumérico (Mínimo 1 caracteres, máximo 50 caracteres). Excepto comillas dobles &quot; ; | &amp; @ &lt; >" data-val-regex-pattern="^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚÄäËëÏïÖöÜü´@_\.,:\-\{\}\[\]\+\*!¡¿\?#\$%&#39;/\(\)=\s]{1,50}$" id="numeropermisosct" name="numeropermisosct" type="text" value="<?php echo !empty($userData['numeropermisosct']) ? $userData['numeropermisosct'] : ''; ?>" />
								<span class="field-validation-valid" data-valmsg-for="numeropermisosct" data-valmsg-replace="true"></span>
                            </div>

                            <label class="col-sm-2 col-form-label">Nombrea Seguradora Responsabilidad Civil</label>
                            <div class="col-sm-2">
                                <input class="form-control" data-val="true" data-val-regex="Alfanumérico (Mínimo 3 caracteres, máximo 50 caracteres). Excepto comillas dobles &quot; ; | &amp; @ &lt; >" data-val-regex-pattern="^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚÄäËëÏïÖöÜü´@_\.,:\-\{\}\[\]\+\*!¡¿\?#\$%&#39;/\(\)=\s]{3,50}$" id="nombreaseguradoraresponsabilidadcivil" name="nombreaseguradoraresponsabilidadcivil" type="text" value="<?php echo !empty($userData['nombreaseguradoraresponsabilidadcivil']) ? $userData['nombreaseguradoraresponsabilidadcivil'] : ''; ?>" />
								<span class="field-validation-valid" data-valmsg-for="nombreaseguradoraresponsabilidadcivil" data-valmsg-replace="true"></span>
                            </div>
                    </div>
                                        

                    <div class="form-group  row">
                        <label class="col-sm-2 col-form-label">Numero Poliza Responsabilidad Civil</label>
                            <div class="col-sm-2">
                                <input class="form-control" data-val="true" data-val-regex="Alfanumérico (Mínimo 1 caracteres, máximo 50 caracteres). Excepto comillas dobles &quot; ; | &amp; @ &lt; >" data-val-regex-pattern="^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚÄäËëÏïÖöÜü´@_\.,:\-\{\}\[\]\+\*!¡¿\?#\$%&#39;/\(\)=\s]{1,50}$" id="numeropolizaresponsabilidadcivil" name="numeropolizaresponsabilidadcivil" type="text" value="<?php echo !empty($userData['numeropolizaresponsabilidadcivil']) ? $userData['numeropolizaresponsabilidadcivil'] : ''; ?>" />
								<span class="field-validation-valid" data-valmsg-for="numeropolizaresponsabilidadcivil" data-valmsg-replace="true"></span>
                            </div>

                            <label class="col-sm-2 col-form-label">Nombre Seguradora Carga</label>
                            <div class="col-sm-2">
                                <input class="form-control" data-val="true" data-val-regex="Alfanumérico (Mínimo 3 caracteres, máximo 50 caracteres). Excepto comillas dobles &quot; ; | &amp; @ &lt; >" data-val-regex-pattern="^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚÄäËëÏïÖöÜü´@_\.,:\-\{\}\[\]\+\*!¡¿\?#\$%&#39;/\(\)=\s]{3,50}$" id="nombreaseguradoracarga" name="nombreaseguradoracarga" type="text" value="<?php echo !empty($userData['nombreaseguradoracarga']) ? $userData['nombreaseguradoracarga'] : ''; ?>"/>
								<span class="field-validation-valid" data-valmsg-for="nombreaseguradoracarga" data-valmsg-replace="true"></span>
                            </div>

                            <label class="col-sm-2 col-form-label">Numero Poliza Carga</label>
                            <div class="col-sm-2">
                                <input class="form-control" data-val="true" data-val-regex="Alfanumérico (Mínimo 1 caracteres, máximo 50 caracteres). Excepto comillas dobles &quot; ; | &amp; @ &lt; >" data-val-regex-pattern="^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚÄäËëÏïÖöÜü´@_\.,:\-\{\}\[\]\+\*!¡¿\?#\$%&#39;/\(\)=\s]{1,50}$" id="numeropolizacarga" name="numeropolizacarga" type="text" value="<?php echo !empty($userData['numeropolizacarga']) ? $userData['numeropolizacarga'] : ''; ?>" />
								<span class="field-validation-valid" data-valmsg-for="numeropolizacarga" data-valmsg-replace="true"></span>
                            </div>

                    </div>
                                 

                    <div class="form-group  row">
                            <label class="col-sm-2 col-form-label">Nombre Aseguradora Medio Ambiente</label>
                            <div class="col-sm-2">
                                <input class="form-control" data-val="true" data-val-regex="Alfanumérico (Mínimo 3 caracteres, máximo 50 caracteres). Excepto comillas dobles &quot; ; | &amp; @ &lt; >" data-val-regex-pattern="^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚÄäËëÏïÖöÜü´@_\.,:\-\{\}\[\]\+\*!¡¿\?#\$%&#39;/\(\)=\s]{3,50}$" id="nombreaseguradoramedioambiente" name="nombreaseguradoramedioambiente" type="text" value="<?php echo !empty($userData['nombreaseguradoramedioambiente']) ? $userData['nombreaseguradoramedioambiente'] : ''; ?>"/>
								<span class="field-validation-valid" data-valmsg-for="nombreaseguradoramedioambiente" data-valmsg-replace="true"></span>
                            </div>

                            <label class="col-sm-2 col-form-label">Numero Poliza Medio Ambiente</label>
                            <div class="col-sm-2">
                                <input class="form-control" data-val="true" data-val-regex="Alfanumérico (Mínimo 3 caracteres, máximo 50 caracteres). Excepto comillas dobles &quot; ; | &amp; @ &lt; >" data-val-regex-pattern="^[A-Za-z0-9ñÑáéíóúÁÉÍÓÚÄäËëÏïÖöÜü´@_\.,:\-\{\}\[\]\+\*!¡¿\?#\$%&#39;/\(\)=\s]{3,50}$" id="numeropolizamedioambiente" name="numeropolizamedioambiente" type="text" value="<?php echo !empty($userData['numeropolizamedioambiente']) ? $userData['numeropolizamedioambiente'] : ''; ?>"/>
								<span class="field-validation-valid" data-valmsg-for="numeropolizamedioambiente" data-valmsg-replace="true"></span>
                            </div>
                            
                            <label class="col-sm-2 col-form-label">Prima Seguro</label>
                            <div class="col-sm-2">
                                <input class="form-control" data-val="true" data-val-regex="El campo Prima del seguro debe ser un número." data-val-regex-pattern="(19[0-9]{2}|20[0-9]{2})" id="primaseguro" name="primaseguro" type="number" value="<?php echo !empty($userData['primaseguro']) ? $userData['primaseguro'] : ''; ?>"/>
								<span class="field-validation-valid" data-valmsg-for="primaseguro" data-valmsg-replace="true"></span>
                            </div>

                    </div>
                              
                    <input type="hidden" name="id" value="<?php echo !empty($userData['id']) ? $userData['id'] : ''; ?>">
                    <input type="submit" name="userSubmit" class="btn btn_gris" value="Guardar"/>
                    
                </form>
            </section>


        </div>
