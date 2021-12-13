<?php
//start session
session_start();
include('../estilos.php');
//get session data
$sessData = !empty($_SESSION['sessData']) ? $_SESSION['sessData'] : '';

//load and initialize database class
require_once '../DB.class.php';
$db = new DB();

//get register from database
$register = $db->getRows('facturacion', array('order_by' => 'id DESC'));

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
                                    Facturación
                                    <a href="addEdit.php" class="glyphicon glyphicon-plus"></a>
                                </div>
                                <table id="example" class="hover" style="width:100%">
                                    <thead style="background-color: #f5f5f5">
                                        <tr>
                                            <th></th>
                                            <th>Editar</th>
                                            <th class='text-center'>rfc</th>
                                            <th class='text-center'>nombre razon</th>
                                            <th class='text-center'>curp</th>
                                            <th class='text-center'>tax_id</th>
                                            <th class='text-center'>no licencia</th>
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
                                                    <td><?php echo $transporte['rfc']; ?></td>
                                                    <td><?php echo $transporte['nombre_razon']; ?></td>
                                                    <td><?php echo $transporte['curp']; ?></td>
                                                    <td><?php echo $transporte['tax_id']; ?></td>
                                                    <td><?php echo $transporte['no_licencia']; ?></td>
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
        });
    </script>