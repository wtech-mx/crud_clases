
<?php
//start session
session_start();
include('./estilos.php');
//get session data
$sessData = !empty($_SESSION['sessData']) ? $_SESSION['sessData'] : '';

//load and initialize database class
require_once 'DB.class.php';
$db = new DB();

//get register from database
$register = $db->getRows('cporte_tvehiculos', array('order_by' => 'id DESC'));

//get status message from session
if (!empty($sessData['status']['msg'])) {
    $statusMsg = $sessData['status']['msg'];
    $statusMsgType = $sessData['status']['type'];
    unset($_SESSION['sessData']['status']);
}
?>

<section id="cuerpo-container-app">         
        <section class="content-header navbar-light">
            <div class="container-fluid">
                <div class="row mb-2">
                    
                <div class="col-sm-6"> 
                    <h1> Dashboard </h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="../../">Inicio</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>

            </div>
            </div>
</section>

<div style="display:inline-block; width:100%; overflow:auto; text-align:center; padding: 0px 30px 50px 30px; ">
    <div class="cont-regCfdi" style="width: auto; display:inline-block;">  
        <div class="content" style="width: auto; display:inline-block;">
            <div class="griDregCFD" style="overflow-y:hidden; ">

            <!-- tabla -->
            <div class="container">
                <?php if (!empty($statusMsg) && ($statusMsgType == 'success')) { ?>
                    <div class="alert alert-success"><?php echo $statusMsg; ?></div>
                <?php } elseif (!empty($statusMsg) && ($statusMsgType == 'error')) { ?>
                    <div class="alert alert-danger"><?php echo $statusMsg; ?></div>
                <?php } ?>
                <div class="row">
                    <div class="panel panel-default register-content">
                        <div class="panel-heading">
                            Transporte 
                            <a href="addEdit.php" class="glyphicon glyphicon-plus"></a>
                    </div>
                        <table id="example" class="hover" style="width:100%">
                            <thead style="background-color: #f5f5f5">
                                <tr>
                                    <th></th>
                                    <th>Editar</th>
                                    <th class='text-center'>Placa</th>
                                    <th class='text-center'>A??o </th>
                                    <th class='text-center'>Tipo </th>
                                    <th class='text-center'>Permiso SCT</th>
                                    <th class='text-center'># Permiso</th>
                                    <th class='text-center'>Aseguradora resp. civil</th>
                                    <th class='text-center'># Poliza resp. civil</th>
                                    <th class='text-center'>Aseguradora de la carga</th>
                                    <th class='text-center'># P??liza de la carga</th>
                                    <th class='text-center'>Aseguradora del medio ambiente</th>
                                    <th class='text-center'># P??liza medio ambiente</th>
                                    <th class='text-center'>Prima del seguro</th>
                                    
                                </tr>
                            </thead>
                            <tbody id="userData">
                                <?php if (!empty($register)) : $count = 0;
                                    foreach ($register as $transporte) : $count++; ?>
                                        <tr>
                                            <td><?php echo $count; ?></td>
                                            <td>
                                                <a href="addEdit.php?id=<?php echo $transporte['id']; ?>" class="glyphicon glyphicon-edit" style="color: #868686"></a>
                                                <a href="userAction.php?action_type=delete&id=<?php echo $transporte['id']; ?>" class="glyphicon glyphicon-trash" onclick="return confirm('Are you sure to delete?')" style="color: #868686"></a>
                                            </td>
                                            <td><?php echo $transporte['placa']; ?></td>
                                            <td><?php echo $transporte['anio']; ?></td>
                                            <td><?php echo $transporte['tipo']; ?></td>
                                            <td><?php echo $transporte['permisosct']; ?></td>
                                            <td><?php echo $transporte['numeropermisosct']; ?></td>
                                            <td><?php echo $transporte['nombreaseguradoraresponsabilidadcivil']; ?></td>
                                            <td><?php echo $transporte['numeropolizaresponsabilidadcivil']; ?></td>
                                            <td><?php echo $transporte['nombreaseguradoracarga']; ?></td>
                                            <td><?php echo $transporte['numeropolizacarga']; ?></td>
                                            <td><?php echo $transporte['nombreaseguradoramedioambiente']; ?></td>
                                            <td><?php echo $transporte['numeropolizamedioambiente']; ?></td>
                                            <td><?php echo $transporte['primaseguro']; ?></td>

                                        </tr>
                                    <?php endforeach;
                                else : ?>
                                    <tr>
                                        <td colspan="5">No Registers(s) found......</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- table -->

            </div>
        </div>

    </div>

</div>



<script>

$(document).ready(function() {
    $('#example').DataTable();
} );
</script>